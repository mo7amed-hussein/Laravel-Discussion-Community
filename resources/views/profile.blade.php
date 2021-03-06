@extends('layout.main')
@section('title',' | '.$user->name)
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
		<div class="user-info back-primary">
		<img src="{{url('avatar/'.$user->avatar)}}" style="">
		<h4>{{$user->name}}</h4>
        <small class="help-block"><a href="{{route('profile.all.show',$user->userName)}}" class="text-muted">{{'@'.$user->userName}}</a> </small>
		<p><strong>Bio </strong>{{$user->bio}}</p>
		
		<p>Country:</strong>{{$user->country}}</p>
		<p>{{$user->email}}</p>
		<p>join : {{date('M j,Y',strtotime($user->created_at))}}</p>
		<p>last : {{$user->updated_at->diffForHumans()}}</p>
		</div>
		</div>
	</div>
	</div>
	<div class="col-md-9">
		<div class="row">
			<ul class="nav nav-pills">
				<li class="active"><a href="{{route('profile.all.show',$user->userName)}}">Questions <span class="badge">{{$user->questions->count()}}</span></a></li>
			</ul>
			<hr>
		</div>
		<div class="row">
            @foreach($questions as $quest)
            <div class="question-lg">
                <p class="title-lg"> <a href="{{route('questions.show',$quest->id)}}" class="text text-primary">{{$quest->title}}</a> </p>
                <div class="question-lg-info">
                     <small class="text-muted">asked {{$quest->created_at->diffForHumans()}} |3 answers |{{$quest->views}} views</small>
                </div>
                <p class="question-tags-lg">
                    @foreach($quest->tags as $tag)
                  <a class="label label-default" href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a>
                  @endforeach
                </p>
            </div>
            @endforeach
            <p class="text-center">{{$questions->links()}}</p>
		</div>
	</div>
</div>
@endsection	