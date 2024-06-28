<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    //method untuk menampilkan data student
    public function index()
    {
        //menarik data dari database
        $students =   student::all();
        return view('admin.contents.student.index', [
            'students' => $students
        ]);
    }



    public function create()
    {
        //mendapatkan data course
        $courses = Course::all();
        
        //panggil view
        return view('admin.contents.student.create', [
            'courses' => $courses
        ]);
         
    }


    //method untuk menyimpan student
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable',
        ]);

        //simpan ke database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id,
        ]);

        //kembali ke halaman student
        return redirect('/admin/student')->with('message', 'berhasil menambahkan student');
    }

    // method untuk menampilkan halaman edit
    public function edit($id,)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // Select * FOM students WHERE id = $id;

        $courses = Course::all();

        return view('admin.contents.student.edit', [
            'student' => $student,
            'courses' => $courses,
        ]);
    }

    //method untuk menyimpan hasil update
    public function update($id, Request $request)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // Select * FOM students WHERE id = $id;

        // validasi request 
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'course_id' => 'nullable',
        ]);

        // simpan perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'course_id' => $request->course_id,
        ]);
        // kembalikan kehalaman student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }

    // method untuk menghapus student
    public function destroy($id)
    {
        // cari data student berdasarkan id
        $student = Student::find($id); // Select * FOM students WHERE id = $id;

        // hapus student
        $student->delete();

        // kembalikan kehalaman student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }
}