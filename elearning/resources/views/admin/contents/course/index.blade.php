@extends('admin.main')
@section('content')
<div class="pagetitle">
  <h1>Course</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"></li>
      <li class="breadcrumb-item active">Course</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="card">
    <div class="card-body">
      <a href="/admin/course/create" class="btn btn-primary my-2">
        + Course
      </a>
      <table class="table">
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Category</th>
          <th>Desc</th>
          <th>Action</th>
        </tr>
        @foreach ($courses as $crs)
        <tr>
          <td>1</td>
          <td>{{ $crs-> name}}</td>
          <td>{{ $crs-> category}}</td>
          <td>{{ $crs-> desc}}</td>
          <td class="d-flex">
            <a href="/admin/course/edit/{{ $crs->id }}" class="btn btn-warning me-2">Edit</a>
            <form action="/admin/course/delete/{{ $crs->id }}" method="post">
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
