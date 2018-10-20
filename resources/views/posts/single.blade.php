@extends('layouts.main')
@section('content')
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		@if(Auth::user())
		<a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
		{!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
		{{Form::hidden('_method','DELETE')}}
		{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		{!! Form::close() !!}
		@endif
		<br>
		@if(sizeof($post)>0)
		<small>{{$post->created_at}} created by <b>{{$post->user->name}}</b></small>
		<h1>{{$post->title}}</h1>
		<img style="width: 100%" src="/storage/cover_images/{{$post->cover_img}}" alt="{{$post->title}}">
		<p>{!!$post->text!!}</p>
		@endif
	</div>
@endsection