@extends('layout.main')
@section('title',' | register')
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				Sign UP
			</div>
			<div class="panel-body">
			<form action="{{route('register')}}" method="post" class="form-horizontal">
				{{csrf_field()}}

				<div class="form-group">
					<label class="col-md-4 control-label">Name</label>
					<div class="col-md-6">
					<input type="text" name="name" class="form-control" value="{{old('name')}}">
					@if($errors->has('name'))
					<span class="help-block">
						<strong>{{$errors->first('name')}}</strong>
					</span>
					@endif
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Email</label>
					<div class="col-md-6">
					<input type="text" name="email" class="form-control" value="{{old('email')}}">
					@if($errors->has('email'))
					<span class="help-block">
						<strong>{{$errors->first('email')}}</strong>
					</span>
					@endif
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-4 control-label">Password</label>
					<div class="col-md-6">
					<input type="password" name="password" class="form-control">
					@if($errors->has('password'))
					<span class="help-block">
						<strong>{{$errors->first('password')}}</strong>
					</span>
					@endif
				</div>
				</div>

				<div class="form-group">
					<label class=" col-md-4 control-label">Confirm Password</label>
					<div class="col-md-6">
					<input type="password" name="password_confirmation" class="form-control">
				</div>
				</div>
			
			</div>
			<div class="panel-footer">
				<div class="form-group row">

				<div class="col-md-6 col-md-offset-3">
					<input type="submit" name="submit" value="Register" class="btn btn-success btn-block">
			    </div>
			    </div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection