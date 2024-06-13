<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseConteroller extends Controller
{
    //
    public function index(){
        // menarik data dari database
        $course = Course::all();
        

        // panggil view dan kirim data course
        return view('admin.contents.course.index',[
            'course' => $course
        ]);
    }
}
