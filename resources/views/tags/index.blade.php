@extends('layout.main')
@section('title',' | all tags')
@section('content')
<div class="row">
	<div class="col-md-2">
		<h3>All Tags <span class="badge">{{$tags->total()}}</span></h3>
	</div>
	<div class="col-md-2 col-md-offset-8">
		<a href="{{route('tags.create')}}" class="btn btn-primary btn-block pull-right">Create Tag</a>
	</div>
</div>
<div class="row">
	<table class="table">
		<thead><th>#</th><th>Name</th><th>Questions</th><th>Actions</th></thead>
		<tbody>
			@foreach($tags as $tag)
			<tr><td>{{$tag->id}}</td>
				<td><a href="{{route('tags.show',$tag->id)}}" class="label label-default">{{$tag->name}}</a></td>
				<td>{{$tag->questions->count()}}</td>
				<td>
					<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a>
					<a href="{{route('tags.destroy',$tag->id)}}" class="btn btn-danger btn-sm">delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot class="text-center">
			<tr><td colspan="3">{{$tags->links()}}</td></tr>
		</tfoot>
	</table>
</div>
@endsection