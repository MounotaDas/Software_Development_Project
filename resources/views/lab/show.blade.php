<!DOCTYPE html>
<html>
<head>
    <title>Lab Part Number Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Lab Part Number Details</h3>

<div class="card">
  <div class="card-body">
    <ul class="list-group">
      <li class="list-group-item"><strong>Attendance:</strong> {{ $lab->lab_attendance }}</li>
      <li class="list-group-item"><strong>Performance:</strong> {{ $lab->lab_performance }}</li>
      <li class="list-group-item"><strong>Report:</strong> {{ $lab->lab_report }}</li>
      <li class="list-group-item"><strong>Viva:</strong> {{ $lab->lab_viva }}</li>
      <li class="list-group-item"><strong>Project:</strong> {{ $lab->lab_project }}</li>
      <li class="list-group-item"><strong>Total:</strong> {{ $lab->lab_total }}</li>
    </ul>
  </div>
</div>

<div class="mt-3">
  <a href="{{ route('lab.index') }}" class="btn btn-secondary">Back to List</a>
  <a href="{{ route('lab.edit', $lab->id) }}" class="btn btn-warning">Edit</a>
</div>

</body>
</html>