@extends('index')

@section('content')
	<div class="col-md-8">
		<form method="POST" action="/login">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="email">Email :</label>
				<input type="email" class="form-control" name="email" id="email" required>
			</div>

			<div class="form-group">
				<label for="password">Password :</label>
				<input type="password" class="form-control" name="password" id="email" required>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-success">Sign in</button>
			</div>

			<div class="form-group">
				@include('layout.errors')
			</div>

		</form>
	</div>
@endsection