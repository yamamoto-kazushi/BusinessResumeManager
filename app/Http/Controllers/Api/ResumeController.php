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

        return $user->toJson();
    }

    public function create(Request $request){

    }

    public function update(Request $request){

    }
}
