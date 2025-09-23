@extends('layout')
@section('title','Feature')
@section('content1')
<div class="hero">
  <nav>
        <div class="header">
            <img src="./images/premier_university.png">
        <div class="text">
                <h1><b> Premier University</b></h1>
                <p>Department of Computer Science And <br>Engineering</br></p>
            </div>
        </div>
        <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('courses.index') }}">Course</a></li>
            <li><a href="{{ route('enrollments.index') }}">Enrollment</a></li>
            <li><a href="#">Result</a></li>
        </ul>
        <button type="button" onclick="window.location='{{ route('logout') }}'">logout</button>
        <div class="menu-icon">
            <i class="fa-solid fa-bars"></i>
        </div>

    </nav>
    <div class="line"></div>
    <div class="footer-container">
        <p class="copyright">University Course & Result management system</p>
</div>

</div>
@endsection