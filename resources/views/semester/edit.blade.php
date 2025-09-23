<!DOCTYPE html>
<html>
<head>
    <title>Edit Semester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Edit Semester</h3>

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

<form action="{{ route('semesters.update', $semester->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Session</label>
        <input type="text" name="session" class="form-control" 
               value="{{ old('session', $semester->session) }}" placeholder="e.g., 2024-25" required>
    </div>

    <div class="mb-3">
        <label>Semester No</label>
        <input type="number" name="semester_no" class="form-control" 
               value="{{ old('semester_no', $semester->semester_no) }}" min="1" max="12" placeholder="e.g., 1" required>
    </div>

    <button type="submit" class="btn btn-success me-2">Update</button>
    <a href="{{ route('semesters.index') }}" class="btn btn-secondary">Back</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
