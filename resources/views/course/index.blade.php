<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
            
        .form-example {
            display: flex;
            gap: 10px;
            align-items: center;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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

<!-- Display Courses List -->
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <form name="search" id="searchForm" method="GET">
            <input type="search" id="searchInput" placeholder="Search..." >
            <button type="submit" id="searchButton">🔍</button>
        </form>
        <h4>Courses List</h4>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add Course</a>
    </div>
    <div class="card-body">
        @if($courses->isEmpty())
            <p class="text-center">No courses available. <a href="{{ route('courses.create') }}">Add a course</a>.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>semester_no</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Credit Hours</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="courseTableBody">
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->semester_no }}</td>
                            <td>{{ $course->course_code }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->credit_hours }}</td>
                            <td>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-success btn-sm">Edit</a>
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Show</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


<script>
    
    function filterTable(searchTerm) {
        const tableBody = document.getElementById('courseTableBody');
        const rows = tableBody.getElementsByTagName('tr');
        let found = false;

        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            const semesterCell = row.cells[1]; 
            const courseCodeCell = row.cells[2]; 
            const courseNameCell = row.cells[3];

            
            const semesterText = semesterCell ? semesterCell.textContent.toLowerCase() : '';
            const courseCodeText = courseCodeCell ? courseCodeCell.textContent.toLowerCase() : '';
            const courseNameText = courseNameCell ? courseNameCell.textContent.toLowerCase() : '';

         if (
                semesterText.includes(searchTerm) ||
                courseCodeText.includes(searchTerm) ||
                courseNameText.includes(searchTerm)
            ) {
                row.style.display = ''; 
                found = true;
            } else {
                row.style.display = 'none';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');

        searchForm.addEventListener('submit', (event) => {
            event.preventDefault(); 
            const searchTerm = searchInput.value.trim().toLowerCase();
            filterTable(searchTerm);
        });

        searchInput.addEventListener('keyup', (event) => {
            const searchTerm = searchInput.value.trim().toLowerCase();
            filterTable(searchTerm);
        });
    });
</script>

</body>
</html>