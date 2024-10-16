<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;


class BaseController extends Controller
{
    public function sendResponse($result,$message){
        $response=[
            'success'=>true,
            'data'=>$result,
            'message'=>$result
        ];
        return response()->json($response,200);
    }
    public function sendError($error,$erroMessage=[],$code=404){
        $response=[
            'success'=>false,
            'data'=>$error,

        ];
        if(!empty($errorMessage)){
            $response['data']=$errorMessage;
        }
        return response()->json($response,$code);
    }
}
