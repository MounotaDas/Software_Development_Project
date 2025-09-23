<!DOCTYPE html>
<html>
<head>
    <title>Lab List</title>
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
    <h4>Lab Part Numbers</h4>
    <a href="{{ route('lab.create') }}" class="btn btn-primary">Add Lab</a>
  </div>
  <div class="card-body">
    @if($labs->isEmpty())
      <p class="text-center">No lab part numbers available. <a href="{{ route('lab.create') }}">Add a lab</a>.</p>
    @else
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Attendance</th>
            <th>Performance</th>
            <th>Report</th>
            <th>Viva</th>
            <th>Project</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($labs as $lab)
          <tr>
            <td>{{ $lab->id }}</td>
            <td>{{ $lab->lab_attendance }}</td>
            <td>{{ $lab->lab_performance }}</td>
            <td>{{ $lab->lab_report }}</td>
            <td>{{ $lab->lab_viva }}</td>
            <td>{{ $lab->lab_project }}</td>
            <td>{{ $lab->lab_total }}</td>
            <td>
              <a href="{{ route('lab.show', $lab->id) }}" class="btn btn-info btn-sm">Show</a>
              <a href="{{ route('lab.edit', $lab->id) }}" class="btn btn-success btn-sm">Edit</a>
              <form action="{{ route('lab.destroy', $lab->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this lab?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>