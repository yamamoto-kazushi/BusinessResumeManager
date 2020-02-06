<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeController extends Controller
{
    public function index(){
        return ['data' => 'test', 'message' => 'api疎通確認中'];
    }

    public function create(Request $request){

    }

    public function update(Request $request){

    }
}
