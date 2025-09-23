<!DOCTYPE html>
<html>
<head>
    <title>Semesters List</title>
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
    <h4 class="mb-0">Semesters List</h4>
    <a href="{{ route('semesters.create') }}" class="btn btn-primary">Add Semester</a>
  </div>
  <div class="card-body">
    @if($semesters->isEmpty())
      <p class="text-center text-muted">No semesters available. <a href="{{ route('semesters.create') }}">Add a semester</a>.</p>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-light">
            <tr>
              <th>ID</th>
              <th>Session</th>
              <th>Semester No</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($semesters as $semester)
            <tr>
              <td>{{ $semester->id }}</td>
              <td>{{ $semester->session }}</td>
              <td>{{ $semester->semester_no }}</td>
              <td class="d-flex gap-1">
                <a href="{{ route('semesters.show', $semester->id) }}" class="btn btn-info btn-sm">Show</a>
                <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-success btn-sm">Edit</a>
                <form action="{{ route('semesters.destroy', $semester->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this semester?');">
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
