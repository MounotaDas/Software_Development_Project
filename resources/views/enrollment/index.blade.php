<!DOCTYPE html>
<html>
<head>
    <title>Enrollments List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
.check-container {
  display: inline-block;
  position: relative;
  cursor: pointer;
  font-size: 20px;
  user-select: none;
}

.check-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

.checkmark {
  height: 15px;
  width: 15px;
  background-color: #eee;
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #ccc;
}

/* When checked, show green box */
.check-container input:checked ~ .checkmark {
  background-color: #28a745;
  border-color: #28a745;
}

 
</style>
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
    <h4>Enrollments List</h4>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Add Enrollment</a>
  </div>
  <div class="card-body">
    @if($enrollments->isEmpty())
      <p class="text-center">No enrollments available. <a href="{{ route('enrollments.create') }}">Add an enrollment</a>.</p>
    @else
    <form action="{{ route('enrollment.submit') }}" method="POST">
    @csrf
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Option</th>
            <th>Student ID</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Semester No</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($enrollments as $enrollment)
          <tr>
             <td>
                        <label class="check-container">
                            <input type="checkbox" name="selected_courses[]" value="{{ $enrollment->id}}">
                            <span class="checkmark"></span>
                        </label>
                    </td>
            
            <td>{{ $enrollment->student_id }}</td>
            <td>{{ $enrollment->course_code }}</td>
            <td>{{ $enrollment->course_name }}</td>
            <td>{{ $enrollment->semester_no }}</td>
            
             <td>
                        <select name="type[{{ $enrollment->id }}]" class="form-select form-select-sm">
                            <option value="Regular" {{ $enrollment->type=="Regular" ? 'selected' : '' }}>Regular</option>
                            <option value="Recourse" {{ $enrollment->type=="Recourse" ? 'selected' : '' }}>Recourse</option>
                            <option value="Retake" {{ $enrollment->type=="Retake" ? 'selected' : '' }}>Retake</option>
                        </select>
                    </td>
            <td>
              <a href="{{ route('enrollments.show', $enrollment->id) }}" class="btn btn-info btn-sm">Show</a>
              <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-success btn-sm">Edit</a>
              <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
       <div class="text-center mt-3">
            <button type="submit" class="btn btn-primary px-5">Submit</button>
        </div>
     
    @endif
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>