@extends ('layout.master')


@section ('content')
	<section class="card-section">
		<div class="card">
			<h4 class="card-title">{{$task->id}}</h4>
			<p class="card-text">{{$task->body}} </p>
		</div>
	</section>
@endsection
