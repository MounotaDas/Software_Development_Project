<!DOCTYPE html>
<html>
<head>
    <title>Edit Theory Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Edit Theory Record</h3>

<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('theory.update', $theory->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Attendance</label>
        <input type="number" name="theory_attendance" class="form-control" 
               value="{{ old('theory_attendance', $theory->theory_attendance) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label>Class Test (CT)</label>
        <input type="number" name="theory_ct" class="form-control" 
               value="{{ old('theory_ct', $theory->theory_ct) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label>Midterm</label>
        <input type="number" name="theory_midterm" class="form-control" 
               value="{{ old('theory_midterm', $theory->theory_midterm) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label>Assignment</label>
        <input type="number" name="theory_assignment" class="form-control" 
               value="{{ old('theory_assignment', $theory->theory_assignment) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label>Final</label>
        <input type="number" name="theory_final" class="form-control" 
               value="{{ old('theory_final', $theory->theory_final) }}" min="0" required>
    </div>

    <div class="mb-3">
        <label>Total</label>
        <input type="number" name="theory_total" class="form-control" 
               value="{{ old('theory_total', $theory->theory_total) }}" min="0" required>
    </div>

    <button type="submit" class="btn btn-success me-2">Update</button>
    <a href="{{ route('theory.index') }}" class="btn btn-secondary">Back</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
