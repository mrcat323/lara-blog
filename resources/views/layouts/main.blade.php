<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>{{$title}}</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	@include('layouts.menu')
	<div class="container">
		@include('layouts.messages')
		@yield('content')
	</div>
	    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
	<script src="{{asset('js/app.js')}}"></script>
</body>
</html>