<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<!-- message-->
		@if(Session::has('success'))
		<div class="alert alert-success">
			{{Session::get('success')}}
		</div>
		@endif
	</div>
</div>