@extends('layouts.main')
@section('content')
		<div class="jumbotron">
			<div class="row text-center">
				<h2>{{ $title }}</h2>
			</div>
		</div>
			<div class="jumbotron">
				<div class="row text-center">
					<h2>{{ $message }}</h2>
				</div>
			</div>
@endsection
