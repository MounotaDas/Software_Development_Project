<!DOCTYPE html>
<html>
<head>
    <title>Result Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Result Details</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <strong>Theory Part Number:</strong>
                <span>{{ $result->theory_part_numbers }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Lab Part Number:</strong>
                <span>{{ $result->lab_part_numbers }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Final Marks:</strong>
                <span>{{ $result->final_marks }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Letter Grade:</strong>
                <span>{{ $result->letter_grade }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Grade Point:</strong>
                <span>{{ $result->grade_point }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Status:</strong>
                <span>{{ $result->status }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <strong>Auto Calculated:</strong>
                <span>{{ $result->is_auto_calculated ? 'Yes' : 'No' }}</span>
            </li>
        </ul>
    </div>
</div>

<div class="mt-3 d-flex gap-2">
    <a href="{{ route('results.index') }}" class="btn btn-secondary">Back to List</a>
    <a href="{{ route('results.edit', $result->id) }}" class="btn btn-warning">Edit</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
