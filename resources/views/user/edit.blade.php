<!-- resources/views/user/edit.blade.php -->
<h1>Edit User</h1>
@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
<form action="{{ route('users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    Name: <input type="text" name="name" value="{{ old('name', $user->name) }}"><br>
    Email: <input type="email" name="email" value="{{ old('email', $user->email) }}"><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('users.index') }}">Back to List</a>
