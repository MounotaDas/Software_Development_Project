<!DOCTYPE html>
<html>
<head>
    <title>Add Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h3>Add New Result</h3>

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

<form action="{{ route('results.store') }}" method="POST">
  @csrf

  <div class="mb-3">
    <label>Theory Part Number</label>
    <select name="theory_part_number_id" class="form-control" required>
      <option value="">Select Theory Record</option>
      @foreach($theories as $theory)
        <option value="{{ $theory->id }}" {{ old('theory_part_number_id') == $theory->id ? 'selected' : '' }}>
          ID: {{ $theory->id }} | Total: {{ $theory->theory_total }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Lab Part Number</label>
    <select name="lab_part_number_id" class="form-control" required>
      <option value="">Select Lab Record</option>
      @foreach($labs as $lab)
        <option value="{{ $lab->id }}" {{ old('lab_part_number_id') == $lab->id ? 'selected' : '' }}>
          ID: {{ $lab->id }} | Total: {{ $lab->lab_total }}
        </option>
      @endforeach
    </select>
  </div>

  <div class="mb-3">
    <label>Final Marks</label>
    <input type="number" name="final_marks" class="form-control" value="{{ old('final_marks') }}" required>
  </div>

  <div class="mb-3">
    <label>Letter Grade</label>
    <input type="text" name="letter_grade" class="form-control" value="{{ old('letter_grade') }}" required>
  </div>

  <div class="mb-3">
    <label>Grade Point</label>
    <input type="number" step="0.01" name="grade_point" class="form-control" value="{{ old('grade_point') }}" required>
  </div>

  <div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control" required>
      <option value="pass" {{ old('status') == 'pass' ? 'selected' : '' }}>Pass</option>
      <option value="fail" {{ old('status') == 'fail' ? 'selected' : '' }}>Fail</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Is Auto Calculated?</label>
    <select name="is_auto_calculated" class="form-control" required>
      <option value="1" {{ old('is_auto_calculated') == '1' ? 'selected' : '' }}>Yes</option>
      <option value="0" {{ old('is_auto_calculated') == '0' ? 'selected' : '' }}>No</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
  <a href="{{ route('results.index') }}" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
