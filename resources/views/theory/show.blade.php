<!DOCTYPE html>
<html>
<head>
    <title>Theory Record Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Theory Record Details</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <strong>Attendance:</strong>
                <span>{{ $theory->theory_attendance }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>CT:</strong>
                <span>{{ $theory->theory_ct }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Midterm:</strong>
                <span>{{ $theory->theory_midterm }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Assignment:</strong>
                <span>{{ $theory->theory_assignment }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Final:</strong>
                <span>{{ $theory->theory_final }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Total:</strong>
                <span>{{ $theory->theory_total }}</span>
            </li>
        </ul>
    </div>
</div>

<div class="mt-3 d-flex gap-2">
    <a href="{{ route('theory.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('theory.edit', $theory->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('theory.destroy', $theory->id) }}" method="POST" 
          onsubmit="return confirm('Are you sure you want to delete this record?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
