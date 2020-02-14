<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ResumeList;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \Log::info(__METHOD__ .' start.');

        $user = \Auth::user();
        $ex = ResumeList::where('emproyee_no', $user->emproyee_no)->get();
        $response = [
            'user' => $user,
            'ex' => $ex
        ];

        \Log::info(__METHOD__ .' end.');

        return \Response::json($response);
    }

    /**
     * ユーザ一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function userList()
    {
        \Log::info(__METHOD__ .' start.');

        $user = \Auth::user();
        // 管理者ではない場合はエラーとする
        $user = \Auth::user();
        if (!$user->admin_flag) {
            return $response = [
                'result' => false,
                'message' => '管理者以外はアクセスできません。'
            ];
            return \Response::json($response);
        }
        // 取得対象カラム
        // 通信容量削減のため、取得項目は最低限にする
        $selectColumn = [
            'emproyee_no',
            'name',
            'email',
            'last_update_datetime'
        ];

        $user = User::where('delete_flag', false)
            ->select($selectColumn)
            ->orderBy('emproyee_no', 'asc')
            ->get();
        $response = [
            'result' => true,
            'list' => $user
        ];

        \Log::info(__METHOD__ .' end.');

        return \Response::json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info(__METHOD__ .' start.');

        // 各種項目を整形
        $birthday = date('Y/m/d', strtotime($request->birthday));

        // 現在日時
        $now = date("Y/m/d H:i:s");

        // ユーザ基本情報登録
        // TODO バリデーションはそのうち
        $user = new User([
            'emproyee_no' => $request->emproyeeNumber,
            'name' => $request->name,
            'name_kana' => $request->nameKana,
            'birthday' => $birthday,
            'gender' => (int)$request->gender,
            'address' => $request->address,
            'country' => $request->country,
            'initial' => $request->initial,
            'education' => $request->education,
            'graduate' => $request->graduate,
            'station' => $request->station,
            'qualifications' => Common::indentToComma($request->qualifications),
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'login_failed' => 0,    // 登録時はログイン失敗回数は固定で0
            'admin_flag' => $request->adminFlag,
            'last_login_datetime' => $now,
            'last_update_datetime' => $now,
            'delete_flag' => false
        ]);
        $user->save();
        \Log::debug($user->getAttributes());

        // 実務経験登録
        $workList = json_decode($request->workList);
        foreach ($workList as $key => $work) {
            $resume = new ResumeList([
                'emproyee_no' => $request->emproyeeNumber,
                'name' => $request->name,
                'num' => $key +1,
                'kind' => $work->kind,
                'comment' => Common::indentToComma($work->comment),
                'start_year' => $work->startYear,
                'start_month' => $work->startMonth,
                'end_year' => $work->endYear,
                'end_month' => $work->endMonth,
                'work_research_flag' => $work->workResearchFlag,
                'work_requirement_flag' => $work->workRequirementFlag,
                'work_bd_flag' => $work->workBdFlag,
                'work_dd_flag' => $work->workDdFlag,
                'work_pg_flag' => $work->workPgFlag,
                'work_t_flag' => $work->workTFlag,
                'work_om_flag' => $work->workOmFlag,
                'work_other_flag' => $work->workOtherFlag,
                'system' => $work->system,
                'type' => $work->type,
                'whole_size' => $work->wholeSize,
                'team_size' => $work->teamSize,
                'os' => Common::indentToComma($work->os),
                'lang' => Common::indentToComma($work->lang),
                'mw' => Common::indentToComma($work->mw),
                'fw' => Common::indentToComma($work->fw),
                'tool' => Common::indentToComma($work->tool),
                'last_update_datetime' => $now,
                'delete_flag' => false
            ]);
            $resume->save();
            \Log::debug($resume->getAttributes());
        }
        \Log::info(__METHOD__ .' end.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        \Log::info(__METHOD__ .' start.');

        $user = User::where('emproyee_no', $id)->get();
        $ex = ResumeList::where('emproyee_no', $id)->get();
        $response = [
            'user' => $user[0],
            'ex' => $ex
        ];

        \Log::info(__METHOD__ .' end.');

        return \Response::json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \Log::info(__METHOD__ .' start.');
        // 管理者ではないユーザが自分以外を更新しようとした場合はエラーとする
        $user = \Auth::user();
        if (!$user->admin_flag && $user->emproyee_no != $id) {
            $response = [
                'result' => false,
                'message' => '管理者以外は他人を更新できません。'
            ];
            return \Response::json($response);
        }
        // 各種項目を整形
        $birthday = date('Y/m/d', strtotime($request->birthday));

        // 現在日時
        $now = date("Y/m/d H:i:s");

        // 基本情報は上書き更新
        $userData = User::where('emproyee_no', $id)->first();
        $userData->name = $request->name;
        $userData->name_kana = $request->nameKana;
        $userData->birthday = $birthday;
        $userData->gender = $request->gender;
        $userData->address = $request->address;
        $userData->country = $request->country;
        $userData->initial = $request->initial;
        $userData->education = $request->education;
        $userData->graduate = $request->graduate;
        $userData->station = $request->station;
        $userData->qualifications = Common::indentToComma($request->qualifications);
        if (!is_null($request->password) && $request->password != '') {
            $userData->password = bcrypt($request->password);
        }
        $userData->admin_flag = $request->adminFlag;
        $userData->last_update_datetime = $now;
        $userData->save();

        // 実務経験は削除、登録
        ResumeList::where('emproyee_no', $id)->delete();
        // 実務経験登録
        $workList = json_decode($request->workList);
        foreach ($workList as $key => $work) {
            $resume = new ResumeList([
                'emproyee_no' => $request->emproyeeNumber,
                'name' => $request->name,
                'num' => $key +1,
                'kind' => $work->kind,
                'comment' => Common::indentToComma($work->comment),
                'start_year' => $work->startYear,
                'start_month' => $work->startMonth,
                'end_year' => $work->endYear,
                'end_month' => $work->endMonth,
                'work_research_flag' => $work->workResearchFlag,
                'work_requirement_flag' => $work->workRequirementFlag,
                'work_bd_flag' => $work->workBdFlag,
                'work_dd_flag' => $work->workDdFlag,
                'work_pg_flag' => $work->workPgFlag,
                'work_t_flag' => $work->workTFlag,
                'work_om_flag' => $work->workOmFlag,
                'work_other_flag' => $work->workOtherFlag,
                'system' => $work->system,
                'type' => $work->type,
                'whole_size' => $work->wholeSize,
                'team_size' => $work->teamSize,
                'os' => Common::indentToComma($work->os),
                'lang' => Common::indentToComma($work->lang),
                'mw' => Common::indentToComma($work->mw),
                'fw' => Common::indentToComma($work->fw),
                'tool' => Common::indentToComma($work->tool),
                'last_update_datetime' => $now,
                'delete_flag' => false
            ]);
            $resume->save();
            \Log::debug($resume->getAttributes());

            $response = [
                'result' => true,
                'message' => '変更に成功しました。'
            ];

            \Log::info(__METHOD__ .' start.');
            return \Response::json($response);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Log::info(__METHOD__ .' start.');

        // 論理削除する
        $userData = User::where('emproyee_no', $id)->first();
        $userData->delete_flag = true;
        $userData->save();

        $updateColumn = [
            'delete_flag' => true
        ];
        ResumeList::where('emproyee_no', $id)
        ->update($updateColumn);

        $response = [
            'result' => true,
            'message' => '削除に成功しました。'
        ];

        \Log::info(__METHOD__ .' start.');
        return \Response::json($response);
    }
}
