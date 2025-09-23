<!DOCTYPE html>
<html>
<head>
    <title>Enrollments List</title>
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

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4>Enrollments List</h4>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Add Enrollment</a>
  </div>
  <div class="card-body">
    @if($enrollments->isEmpty())
      <p class="text-center">No enrollments available. <a href="{{ route('enrollments.create') }}">Add an enrollment</a>.</p>
    @else
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Student ID</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Semester No</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($enrollments as $enrollment)
          <tr>
            <td>{{ $enrollment->id }}</td>
            <td>{{ $enrollment->student_id }}</td>
            <td>{{ $enrollment->course_code }}</td>
            <td>{{ $enrollment->course_name }}</td>
            <td>{{ $enrollment->semester_no }}</td>
            <td>{{ ucfirst($enrollment->type) }}</td>
            <td>
              <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info btn-sm">Show</a>
              <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-success btn-sm">Edit</a>
              <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</button>
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