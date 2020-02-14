<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;

class ResumeController extends Controller
{
    //TODO VBAから呼ぶ関係でトークンが作れないが後々きちんとトークン認証するようにしたい
    public function index($id = null){
        
        if($id === null){
            $user = User::all();
        }else if(strpos($id, '_Resume') !== false){
            $id = str_replace('_Resume', '', $id);
            //複合主キーのためクエリビルダでselect文を書く
            $user = DB::table('resume_lists')->where('emproyee_no', $id)->get();
        }else{
            $user = User::select()->where('emproyee_no', $id)->first();
        }

        if(is_null($user)){
            $user = collect(["error" => "ユーザが登録されていません。"]);
        }

        return $user->toJson();
    }

    public function create(Request $request){
        $user = new User();

        $result = $user->create([
            "emproyee_no" => $request->input("emproyee_no"),
            "name" => $request->input("name"),
            "name_kana" => $request->input("name_kana"),
            "birthday" => $request->input("birthday"),
            "gender" => $request->input("gender"),
            "address" => $request->input("address"),
            "country" => $request->input("country"),
            "initial" => $request->input("initial"),
            "education" => $request->input("education"),
            "graduate" => $request->input("graduate"),
            "station" => $request->input("station"),
            "email" => $request->input("email"),
            "qualifications" => $request->input("qualifications")

        ]);

        return $result->toJson();
    }

    public function update(Request $request){

    }
}
