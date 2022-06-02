<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    private $response =
        [
            'message'=>'succses',
            'code'=>200,
            'payload' => []
        ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:books,name',
            'ganer_id'=>'required',
            'author_id'=>'required',
            'count'=>'required'
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            $this->response['code'] = 419;
            return $this->response;
        }

        $book = Book::create([
            'name'=>$request->name,
            'ganer_id'=>$request->ganer_id,
            'author_id'=>$request->author_id,
            'count'=>$request->count
        ]);
        $this->response['payload'] = $book;
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
