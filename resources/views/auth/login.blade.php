@extends('layout.main')
@section('title',' | login')
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				Login
			</div>
			<div class="panel-body">
			<form action="{{route('login')}}" method="post" class="form-horizontal">
				{{csrf_field()}}
				<div class="form-group">
					<label class="col-md-4 control-label">Email</label>
					<div class="col-md-6">
					<input type="text" name="email" class="form-control">
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
					<div class="col-md-6 col-md-offset-4">
					<label><input type="checkbox" name="remember">
					Remember Me</label>
					</div>
				</div>
			
			</div>
			<div class="panel-footer">
				<div class="form-group row">

				<div class="col-md-7 col-md-offset-3">
					<input type="submit" name="submit" value="login" class="btn btn-success">
					<a href="{{route('password.request')}}" class="btn btn-link">Forgot Your Password?</a>
			    </div>
			    </div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection