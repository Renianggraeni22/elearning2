<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {

        $courses = Course::all();

        return view('admin.contents.course.index', [
            'courses' => $courses
        ]);
    }

    //method untuk menyimpan student
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name' => 'required',
            'kategori' => 'required',
            'desc' => 'required',
        ]);

        //simpan ke database
        Course::create([
            'name' => $request->name,
            'kategori' => $request->kategori,
            'desc' => $request->desc,
            
        ]);

        //kembali ke halaman student
        return redirect('/admin/course')->with('message', 'berhasil menambahkan course');
    }

// method untuk menampilkan halaman edit
public function edit($id,)
{
    // cari data student berdasarkan id
    $courses = Course::find($id); // Select * FOM students WHERE id = $id;

    $courses = Course::all();

    return view('admin.contents.student.edit', [
        'courses' => $courses,
    ]);
}


}