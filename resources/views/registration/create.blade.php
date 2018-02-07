@extends('index')

@section('content')
	<div class="col-md-8">
		<h3>Register</h3>

		<form method="POST" action="/register">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="name">Name: </label>
				<input type="text" class="form-control" name="name" id="name" required>
			</div>

			<div class="form-group">
				<label for="email">Email: </label>
				<input type="email" class="form-control" name="email" id="email" required>
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" name="password" id="password" required>
			</div>

			<div class="form-group">
				<label for="password_confirmation">Re-type Password</label>
				<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Register</button>
			</div>

			<div class="form-group">
				@include('layout.errors')
			</div>

		</form>

	</div>
@endsection