<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Course Details</h3>

<div class="card">
  <div class="card-body">
    <ul class="list-group">
      <li class="list-group-item"><strong>ID:</strong> {{ $course->id }}</li>
      <li class="list-group-item"><strong>Semester No:</strong> {{ $course->semester_no }}</li>
      <li class="list-group-item"><strong>Course Code:</strong> {{ $course->course_code }}</li>
      <li class="list-group-item"><strong>Course Name:</strong> {{ $course->course_name }}</li>
      <li class="list-group-item"><strong>Credit Hours:</strong> {{ $course->credit_hours }}</li>
    </ul>
  </div>
</div>

<a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to Courses</a>

</body>
</html>