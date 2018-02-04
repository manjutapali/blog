@extends('index')

@section('content')
	<div class="col-md-8 blog-main">
		<h2>Create post</h2>
		<hr>
		<form method="POST" action="/posts">
			{{ csrf_field() }}
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name="title">
		  </div>
		  <div class="form-group">
		    <label for="content">Content</label>
		    <textarea type="text" class="form-control" name="content" id="content"></textarea>
		  </div>
		  <div class="form-check">
		    <input type="checkbox" class="form-check-input" id="front" name="front">
		    <label class="form-check-label" for="front">Add to front</label>
		  </div>
		  <button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
@endsection