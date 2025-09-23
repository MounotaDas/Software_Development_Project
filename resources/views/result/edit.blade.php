<!DOCTYPE html>
<html>
<head>
    <title>Edit Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3 class="mb-4">Edit Result</h3>

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

<form action="{{ route('results.update', $result->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Theory Part Number ID -->
    <div class="mb-3">
        <label>Theory Part Number</label>
        <select name="theory_part_number_id" class="form-control" required>
            @foreach($theories as $theory)
                <option value="{{ $theory->id }}" 
                    {{ $result->theory_part_number_id == $theory->id ? 'selected' : '' }}>
                    ID #{{ $theory->id }} - Total: {{ $theory->theory_total }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Lab Part Number ID -->
    <div class="mb-3">
        <label>Lab Part Number</label>
        <select name="lab_part_number_id" class="form-control" required>
            @foreach($labs as $lab)
                <option value="{{ $lab->id }}" 
                    {{ $result->lab_part_number_id == $lab->id ? 'selected' : '' }}>
                    ID #{{ $lab->id }} - Total: {{ $lab->lab_total }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Final Marks</label>
        <input type="number" name="final_marks" class="form-control" 
               value="{{ old('final_marks', $result->final_marks) }}" min="0" max="500" required>
    </div>

    <div class="mb-3">
        <label>Letter Grade</label>
        <input type="text" name="letter_grade" class="form-control" 
               value="{{ old('letter_grade', $result->letter_grade) }}" required>
    </div>

    <div class="mb-3">
        <label>Grade Point</label>
        <input type="number" step="0.01" name="grade_point" class="form-control" 
               value="{{ old('grade_point', $result->grade_point) }}" min="0" max="4.0" required>
    </div>

    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="status" class="form-control" 
               value="{{ old('status', $result->status) }}" required>
    </div>

    <div class="mb-3">
        <label>Is Auto Calculated?</label>
        <select name="is_auto_calculated" class="form-control" required>
            <option value="1" {{ old('is_auto_calculated', $result->is_auto_calculated) ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !old('is_auto_calculated', $result->is_auto_calculated) ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success me-2">Update</button>
    <a href="{{ route('results.index') }}" class="btn btn-secondary">Back</a>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
