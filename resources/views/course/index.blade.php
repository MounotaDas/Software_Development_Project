<!DOCTYPE html>
<html>
<head>
    <title>Courses List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<!-- Display Success Message -->
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<!-- Display Courses List -->
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Courses List</h4>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
  </div>
  <div class="card-body">
    @if($courses->isEmpty())
      <p class="text-center">No courses available. <a href="{{ route('courses.create') }}">Add a course</a>.</p>
    @else
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>semester_no</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Credit Hours</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($courses as $course)
          <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->semester_no }}</td>
            <td>{{ $course->course_code }}</td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->credit_hours }}</td>
            <td>
              <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-success btn-sm">Edit</a>
              <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Show</a>
              <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>