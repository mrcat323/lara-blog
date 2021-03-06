@extends('layouts.main')
@section('content')
	@if (sizeof($posts) > 0)
		@foreach ($posts as $post)
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img style="width: 100%" src="/storage/cover_images/{{ $post->cover_img }}" alt="{{ $post->title }}">
					</div>
					<div class="col-md-8 col-sm-8">
						<h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
						<small>{{ $post->created_at }} created by <b>{{ $post->user->name }}</b></small>
					</div>
				</div>
			</div>
		@endforeach
		<div class="col-sm-4 col-md-5 col-md-3-offset">
			{{ $posts->links() }}
		</div>
	@else
		<div class="jumbotron">
			<h3>Nein posts found...</h3>
		</div>
	@endif
@endsection
