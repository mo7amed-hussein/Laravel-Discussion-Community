@extends('layout.main')
@section('title',' | all users')
@section('content')
<div class="row">
	<div class="col-md-2">
		<h3>All Users <span class="badge">{{$users->total()}}</span></h3>
	</div>
</div>
<div class="row">
	<table class="table">
		<thead><th>Name</th><th>Questions</th><th>comments</th></thead>
		<tbody>
			@foreach($users as $user)
			<tr><td><img src="{{url('avatar/'.$user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px"><a href="{{route('profile.all.show',$user->userName)}}">{{$user->name}}</a></td>
				<td>{{$user->questions->count()}}</td>
				<td>
					{{$user->comments->count()}}
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot class="text-center">
			<tr><td colspan="3">{{$users->links()}}</td></tr>
		</tfoot>
	</table>
</div>
@endsection