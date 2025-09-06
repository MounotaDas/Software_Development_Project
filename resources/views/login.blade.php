@extends('layout')
@section('title','Login')
@section('content')

<div class="nav justify-content-end">
  <div class="nav-item">
    <b>For Faculty Of Engineering :</b> Beta Version
  </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset('images/pic1.png') }}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('images/pic2.png') }}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{ asset('images/pic3.png') }}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="contact-form">
  <h2>PUAIS</h2>
    
  @if(Session::has('error'))
      <div class="alert alert-danger">
          {{ Session::get('error') }}
      </div>
  @endif

  <form method="POST" action="{{ route('DOLOGIN') }}">
    @csrf

   

  <div class="form-group">
    <p>Email</p>
    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" required>
    <p>Password</p>
    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd" required>
   
  </div>
   <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection