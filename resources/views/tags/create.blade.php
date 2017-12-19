@extends('layout.main')
@section('title',' | create tag')
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading text-center">
				Create New Tag
			</div>
			<div class="panel-body">
		<form class="form-horizontal" method="post" action="{{route('tags.store')}}">
			{{csrf_field()}}
			<div class="form-group">
				<label class="control-label col-md-4">Name</label>
				<div class="col-md-6">
					<input type="text" value="{{old('name')}}" name="name" class="form-control">
					@if($errors->has('name'))
					<span class="help-block">
						<strong>{{$errors->first('name')}}</strong>
					</span>
					@endif
				</div>
			</div>
			</div>
			<div class="panel-footer">
				<input type="submit" name="submit" value="submit" class="btn btn-success btn-block">
			</div>
		</form>
		</div>
	</div>
</div>
@endsection