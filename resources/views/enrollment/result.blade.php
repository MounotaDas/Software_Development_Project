@extends('layout')
@section('title','Result')
@section('content5')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Enrollment Result</h2>

    @if(empty($selectedCourses))
        <div class="alert alert-warning text-center">
            No courses were selected. <a href="{{ route('enrollment.index') }}">Go back</a>.
        </div>
    @else
        <table class="table table-bordered text-center">
            <thead class="table-success">
                <tr>
                    <th>S.ID</th>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Semester No</th>
                    <th>Selected Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach($selectedCourses as $course)
                <tr>
                    <td>{{ $course->student_id }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->semester_no }}</td>
                    <td>
                        <span class="badge 
                            @if($course->selected_type == 'Regular') bg-success 
                            @elseif($course->selected_type == 'Recourse') bg-warning 
                            @else bg-danger @endif">
                            {{ $course->selected_type }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center mt-3">
        <a href="{{ route('enrollment.index') }}" class="btn btn-primary">Back to Enrollment</a>
    </div>
</div>
@endsection