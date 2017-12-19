@extends('layout.main')
@section('title',' | '.$tag->name)
@section('content')
<div class="row">
	<div class="col-md-8">
	<table class="table">
		<thead><th>#</th><th>title</th><th>Tags</th></thead>
		<tbody>
			@foreach($tag->questions as $quest)
			<tr><td>{{$quest->id}}</td>
				<td><a href="{{route('questions.show',$quest->id)}}" class="btn btn-link">{{$quest->title}}</a></td>
				<td>
					@foreach($quest->tags as $tag)
					<a href="{{route('tags.show',$tag->id)}}" class="label label-default">{{$tag->name}}</a>
					@endforeach
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Name :</dt>
				<dd>{{$tag->name}}</dd>
				<dt>Questions :</dt>
				<dd><span class="badge">{{$tag->questions->count()}}</span></dd>
			</dl>
		</div>
	</div>
</div>
@endsection