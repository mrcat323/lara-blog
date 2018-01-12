@extends('layouts.main')
@section('content')
	@if(sizeof($posts)>0)
		@foreach($posts as $post)
			<div class="jumbotron">
				<h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
				<small>{{$post->created_at}}</small>
			</div>
		@endforeach
		<div class="col-sm-4 col-md-5 col-md-3-offset">
			{{$posts->links()}}
		</div>
	@else
		<div class="jumbotron">
			<h3>Nein posts found...</h3>
		</div>
	@endif
@endsection