<!DOCTYPE html>
<html>
<head>
    <title>Results List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<!-- Display Success Message -->
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Results List</h4>
    <a href="{{ route('results.create') }}" class="btn btn-primary">Add Result</a>
  </div>
  <div class="card-body">
    @if($results->isEmpty())
      <p class="text-center text-muted">No results available. <a href="{{ route('results.create') }}">Add a result</a>.</p>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Theory Part Number</th>
              <th>Lab Part Number</th>
              <th>Final Marks</th>
              <th>Letter Grade</th>
              <th>Grade Point</th>
              <th>Status</th>
              <th>Auto Calculated?</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($results as $result)
            <tr>
              <td>{{ $result->id }}</td>
              <td>{{ $result->theory_part_numbers }}</td>
              <td>{{ $result->lab_part_numbers }}</td>
              <td>{{ $result->final_marks }}</td>
              <td>{{ $result->letter_grade }}</td>
              <td>{{ $result->grade_point }}</td>
              <td>{{ $result->status }}</td>
              <td>{{ $result->is_auto_calculated ? 'Yes' : 'No' }}</td>
              <td class="d-flex gap-1">
                <a href="{{ route('results.show', $result->id) }}" class="btn btn-info btn-sm">Show</a>
                <a href="{{ route('results.edit', $result->id) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('results.destroy', $result->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this result?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
