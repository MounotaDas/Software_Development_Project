<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Edit Course</h3>

<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('courses.update', $course->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label>Semester No</label>
    <input type="text" name="semester_no" class="form-control" value="{{ old('semester_no', $course->semester_no) }}" required>
  <div class="mb-3">
    <label>Course Code</label>
    <input type="text" name="course_code" class="form-control" value="{{ old('course_code', $course->course_code) }}" required>
  </div>
  <div class="mb-3">
    <label>Course Name</label>
    <input type="text" name="course_name" class="form-control" value="{{ old('course_name', $course->course_name) }}" required>
  </div>
  <div class="mb-3">
    <label>Credit Hours</label>
    <input type="number" name="credit_hours" class="form-control" value="{{ old('credit_hours', $course->credit_hours) }}" required>
  </div>
  <button type="submit" class="btn btn-success">Update</button>
  <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>