@extends('layout.main')
@section('title',' | all tags')
@section('content')
<div class="row">
	<table class="table">
		<thead><th>#</th><th>Name</th><th>Questions</th></thead>
		<tbody>
			@foreach($tags as $tag)
			<tr><td>{{$tag->id}}</td>
				<td><a href="{{route('tags.show',$tag->id)}}" class="label label-default">{{$tag->name}}</a></td>
				<td>{{$tag->questions->count()}}</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot class="text-center">
			<tr><td colspan="3">{{$tags->links()}}</td></tr>
		</tfoot>
	</table>
</div>
@endsection