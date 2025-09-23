<!-- resources/views/user/show.blade.php -->
<h1>User Details</h1>
<p>ID: {{ $user->id }}</p>
<p>Name: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<a href="{{ route('users.edit', $user->id) }}">Edit</a>
<a href="{{ route('users.index') }}">Back to List</a>
