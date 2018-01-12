@extends('layouts.main')
@section('content')
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		@if(sizeof($post)>0)
		<small>{{$post->created_at}}</small>
		<a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
		{!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
		{{Form::hidden('_method','DELETE')}}
		{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		{!! Form::close() !!}
		<h1>{{$post->title}}</h1>
		<p>{!!$post->text!!}</p>
		@endif
	</div>
@endsection