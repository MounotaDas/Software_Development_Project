<!DOCTYPE html>
<html>
<head>
    <title>Add Lab Part Number</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Add Lab Part Number</h3>

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

<form action="{{ route('lab.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label>Attendance</label>
    <input type="number" name="lab_attendance" class="form-control" value="{{ old('lab_attendance') }}" required>
  </div>
  <div class="mb-3">
    <label>Performance</label>
    <input type="number" name="lab_performance" class="form-control" value="{{ old('lab_performance') }}" required>
  </div>
  <div class="mb-3">
    <label>Report</label>
    <input type="number" name="lab_report" class="form-control" value="{{ old('lab_report') }}" required>
  </div>
  <div class="mb-3">
    <label>Viva</label>
    <input type="number" name="lab_viva" class="form-control" value="{{ old('lab_viva') }}" required>
  </div>
  <div class="mb-3">
    <label>Project</label>
    <input type="number" name="lab_project" class="form-control" value="{{ old('lab_project') }}" required>
  </div>
  <div class="mb-3">
    <label>Total</label>
    <input type="number" name="lab_total" class="form-control" value="{{ old('lab_total') }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
  <a href="{{ route('lab.index') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>