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
		@include('layout.partials._messages')
		@yield('content')
		
	</div>
	@include('layout.partials._footer')   
</body>
	<script src="{{url('js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{url('js/bootstrap.js')}}"></script>
	@yield('additional-scripts')
</html>