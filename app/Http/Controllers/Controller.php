<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function responseSuccess($data){
//        return response([
//            'message'=>'succses',
//            'code'=>200,
//            'payload' => [$data]
//        ]);
//    }
//
//    public function responseError($request){
//        $validator = Validator::make($request->all(), [
//            'name'=>'required',
//            'phone'=>'required|unique:students,phone',
//            'password'=>'required',
//            'group_id'=>'required'
//        ]);
//
//        if($validator->fails()){
//            $this->response['message'] = $validator->errors()->first();
//            $this->response['code'] = 419;
//            return $this->response;
//        }
//    }
}
