<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method untuk menampilkan data student
    public function index(){
        // menarik data dari database
        $students = Students::all();
        

        // panggil view dan kirim data students
        return view('admin.contents.student.index',[
            'students' => $students
        ]);
    }

}
