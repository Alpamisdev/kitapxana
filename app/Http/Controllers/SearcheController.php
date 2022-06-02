<?php

namespace App\Http\Controllers;

use App\Http\Resources\FacultyResurce;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Facultet;
use App\Models\Group;
use App\Models\Student;

class SearcheController extends Controller
{
    private $response =
        [
            'message'=>'succses',
            'code'=>200,
            'payload' => []
        ];
    public function search_book($book){

           $books = Book::select('ganers.name as ganer_name', 'authors.name as author_name', 'books.name as name', 'count' )
               ->join('ganers', 'books.ganer_id', '=', 'ganers.id')
               ->join('authors', 'books.author_id', '=', 'authors.id')
               ->where('books.name', 'LIKE', "%{$book}%")
               ->orwhere('authors.name', 'LIKE', "%{$book}%")
               ->orwhere('ganers.name', 'LIKE', "%{$book}%")
               ->get();

           return $books;
    }

    public function search_student($student){

        $data = FacultyResurce::collection(Facultet::with('groups')->get());
        return $data;

//        $data = Facultet::select('facultets.id as facultet_id','facultets.name as facultet_name', 'groups.id as group_id', 'groups.name as group_name', 'students.id as student_id', 'students.name as student_name', 'phone')
//            ->join('groups', 'facultets.id', 'groups.id')
//            ->join('students', 'groups.id', 'students.group_id')
//            ->where('students.name', 'LIKE', "%{$student}%")
//            ->get();
//        return $data;

//        $facultets = Facultet::all();
//        $data = [];
//        $groups = Group::all();
//        $students = Student::all();
//        foreach($facultets as $fa) {
//            foreach ($groups as $val) {
//
//                if ($fa->id == $val->facultet_id) {
//                    $a = [];
//                    foreach ($students as $st) {
//                        if ($val->id == $st->group_id) {
//                            $a[] = $st;
//                        }
//                    }
//                    $data[$fa->name][] = [
//                        'id' => $val->id,
//                        'name' => $val->name,
//                        'students' => $a
//                    ];
//                    $a = [];
//                }
//
//            }
//        }
//        return $data;


//        $facultet = collect(Group::get())->groupBy('facultet_id');
//        return $facultet;
    }
}