<!DOCTYPE html>
<html>
<head>
    <title>Semester Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Semester Details</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <strong>Session:</strong>
                <span>{{ $semester->session }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Semester No:</strong>
                <span>{{ $semester->semester_no }}</span>
            </li>
        </ul>
    </div>
</div>

<div class="mt-3 d-flex gap-2">
    <a href="{{ route('semesters.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('semesters.destroy', $semester->id) }}" method="POST" 
          onsubmit="return confirm('Are you sure you want to delete this semester?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
