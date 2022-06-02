<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
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
            'student_id'=>'required',
            'book_id'=>'required',
            'count'=>'required'
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            $this->response['code'] = 419;
            return $this->response;
        }

        $book_in_librery = Book::where('id', $request->book_id)->pluck('count')[0];
        $deleted_count = $book_in_librery-1;
        if($book_in_librery > 0){
            Book::where('id', $request->book_id)->update([
                'count'=>$deleted_count
            ]);
        }

        $order = Order::create([
            'student_id'=>$request->student_id,
            'book_id'=>$request->book_id,
            'count'=>$request->count
        ]);
        $this->response['payload'] = $order;
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
    public function destroy(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'student_id'=>'required',
            'book_id'=>'required',
        ]);

        if($validator->fails()){
            $this->response['message'] = $validator->errors()->first();
            $this->response['code'] = 419;
            return $this->response;
        }

        $book_in_librery = Book::where('id', $request->book_id)->pluck('count')[0];
        $updated_book = $book_in_librery+1;
        if($book_in_librery > 0){
            Book::where('id', $request->book_id)->update([
                'count'=>$updated_book
            ]);
            Order::destroy($id);
        }

        return $this->response;
    }
}
