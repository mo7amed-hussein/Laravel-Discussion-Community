<!-- main page -->
<!DOCTYPE html>
<html lang="en">
<head>
	@include('layout.partials._head')
</head>
<body>
	@include('layout.partials._nav')
	<div class="container">
		@include('layout.partials._devInfo')
		@yield('content')
		@include('layout.partials._footer')
	</div>   
</body>
	<script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{url('js/bootstrap.js')}}"></script>
	@yield('additional-scripts')
</html>