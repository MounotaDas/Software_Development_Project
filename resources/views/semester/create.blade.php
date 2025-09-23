<!DOCTYPE html>
<html>
<head>
    <title>Add Semester</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Add New Semester</h3>

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

<form action="{{ route('semesters.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Session</label>
        <input type="text" name="session" class="form-control" 
               value="{{ old('session') }}" placeholder="e.g., 2024-25" required>
    </div>
    <div class="mb-3">
        <label>Semester No</label>
        <input type="number" name="semester_no" class="form-control" 
               value="{{ old('semester_no') }}" min="1" max="12" placeholder="e.g., 1" required>
    </div>

    <button type="submit" class="btn btn-primary me-2">Save</button>
    <a href="{{ route('semesters.index') }}" class="btn btn-secondary">Back</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
