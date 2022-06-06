<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class LoginStudent extends Controller
{
    public function login_student(Request $request){
        $phone = $request->phone;
        $studnet = Student::where('phone', $phone)->get();
        $students_order = Order::select('books.name as book_name', 'students.name as student_name', 'orders.count')
            ->where('student_id', $studnet[0]->id)
            ->join('books', 'books.id', 'orders.book_id')
            ->join('students', 'students.id', 'orders.student_id')
            ->get();
        return $students_order;
    }


}
