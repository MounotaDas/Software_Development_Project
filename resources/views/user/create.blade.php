<!-- resources/views/user/create.blade.php -->
<h1>Add New User</h1>
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    Name: <input type="text" name="name" value="{{ old('name') }}"><br>
    Email: <input type="email" name="email" value="{{ old('email') }}"><br>
    <button type="submit">Save</button>
</form>
<a href="{{ route('users.index') }}">Back to List</a>

