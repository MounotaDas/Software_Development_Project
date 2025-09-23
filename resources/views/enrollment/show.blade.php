<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Enrollment Details</h3>

<div class="card">
  <div class="card-body">
    <ul class="list-group">
      <li class="list-group-item"><strong>ID:</strong> {{ $enrollment->id }}</li>
      <li class="list-group-item"><strong>Student ID:</strong> {{ $enrollment->student_id }}</li>
      <li class="list-group-item"><strong>Course Code:</strong> {{ $enrollment->course_code }}</li>
      <li class="list-group-item"><strong>Course Name:</strong> {{ $enrollment->course_name }}</li>
      <li class="list-group-item"><strong>Semester No:</strong> {{ $enrollment->semester_no }}</li>
      <li class="list-group-item"><strong>Type:</strong> {{ ucfirst($enrollment->type) }}</li>
    </ul>
  </div>
</div>

<div class="mt-3">
  <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">Back to List</a>
  <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
</div>

</body>
</html>