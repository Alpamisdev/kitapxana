<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::select('students.name', 'students.phone', 'groups.name as group_name')
            ->join('groups', 'students.group_id', '=', 'groups.id')
            ->get();
    }

    private $response =
        [
            'message'=>'succses',
            'code'=>200,
            'payload' => []
        ];

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'phone'=>'required|unique:students,phone',
            'password'=>'required',
            'group_id'=>'required'
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            $this->response['code'] = 419;
            return $this->response;
        }

        $student = Student::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'group_id'=>$request->group_id
        ]);
        $this->response['payload'] = $student;
        return $this->response;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
