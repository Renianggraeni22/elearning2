@extends('admin.main')
@section('content')
<div class="pagetitle">
    <h1>Student</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"></li>
        <li class="breadcrumb-item active">Student</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
          <a href="/admin/student/create" class="btn btn-primary my-2">
            + Student
          </a>
            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Class</th>
                    <th>Major</th>
                    <th>Action</th>
                    <th>Course</th>
                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>1</td>
                        <td>{{ $student-> name}}</td>
                        <td>{{ $student-> nim}}</td>
                        <td>{{ $student-> class}}</td>
                        <td>{{ $student-> major}}</td>
                        <td>{{ $student-> course->name ?? 'Belum mengikuti'}}</td>
                        <td class="d-flex">
                            <a href="/admin/student/edit/{{ $student->id }}" class="btn btn-warning me-2">Edit</a>
                            <form action="/admin/student/delete/{{ $student->id }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm('apakah anda yakin?')">Delete</button>
                          </form>
                        </td>
   
                    </tr>
                
                @endforeach
            </table>
        </div>
    </div>
  </section>
    
@endsection
