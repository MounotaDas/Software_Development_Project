<!DOCTYPE html>
<html>
<head>
    <title>Theory Records List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<!-- Success Message -->
@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Theory Records</h4>
    <a href="{{ route('theory.create') }}" class="btn btn-primary">Add Record</a>
  </div>
  <div class="card-body">
    @if($theories->isEmpty())
      <p class="text-center text-muted">No theory records available. <a href="{{ route('theory.create') }}">Add a record</a>.</p>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Attendance</th>
              <th>CT</th>
              <th>Midterm</th>
              <th>Assignment</th>
              <th>Final</th>
              <th>Total</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($theories as $theory)
            <tr>
              <td>{{ $theory->id }}</td>
              <td>{{ $theory->theory_attendance }}</td>
              <td>{{ $theory->theory_ct }}</td>
              <td>{{ $theory->theory_midterm }}</td>
              <td>{{ $theory->theory_assignment }}</td>
              <td>{{ $theory->theory_final }}</td>
              <td>{{ $theory->theory_total }}</td>
              <td class="d-flex gap-1">
                <a href="{{ route('theory.show', $theory->id) }}" class="btn btn-info btn-sm">Show</a>
                <a href="{{ route('theory.edit', $theory->id) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('theory.destroy', $theory->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this record?');">
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
