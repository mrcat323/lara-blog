@extends('layouts.main')
@section('content')
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		<h1>Create post</h1>
		{!! Form::open(['action' => ['PostsController@update', $post->id],'method' => 'POST']) !!}
		<div class="form-group">
			{{Form::label('title','Title')}}
			{{Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Title'])}}
		</div>
		<div class="form-group">
			{{Form::label('text','Text')}}
			{{Form::textarea('text',$post->text,['id'=>'article-ckeditor','class' => 'form-control','placeholder' => 'Body text'])}}
		</div>
		{{Form::hidden('_method','PUT')}}
		{{Form::submit('Update',['class' => 'btn btn-primary'])}}

		{!! Form::close() !!}
		{!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) !!}
		{{Form::hidden('_method','DELETE')}}
		{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		{!! Form::close() !!}
	</div>
@endsection