@extends('layouts.main')
@section('content')
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		<h1>Create post</h1>
		{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Title']) }}
		</div>
		<div class="form-group">
			{{ Form::label('text', 'Text') }}
			{{ Form::textarea('text', '',['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body text']) }}
		</div>
		<div class="form-group">
			{{ Form::file('cover_img') }}
		</div>
		{{ Form::submit('Add',['class' => 'btn btn-primary']) }}

		{!! Form::close() !!}
	</div>
@endsection
