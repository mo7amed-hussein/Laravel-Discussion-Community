@extends('layout.main')
@section('title',' | '.$user->name)
@section('content')

@if(count($errors)>0)
<div class="row">
	<div class="center-block">
		<div class="alert alert-warning" role="alert">
			<ul>
				@foreach($errors as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
		<div class="user-info back-primary">
		<img src="{{url('avatar/'.$user->avatar)}}" style="">
		<h4>{{$user->name}} <a href="#name-modal" data-toggle="modal" ><img src="{{url('img/settings.png')}}" class="img-circle btn-setting"></a></h4>
        <small class="help-block"><a href="{{route('profile.all.show',$user->userName)}}">{{'@'.$user->userName}}</a> <a href="#username-modal" data-toggle="modal" ><img src="{{url('img/settings.png')}}" class="img-circle btn-setting"></a></small>
		<p>{{$user->bio}}</p>
		<p><a href="">Messages</a></p>
		<p>Egypt</p>
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
				<li class="{{ Request::is('profile/'.$user->id)?'active':''}}"><a href="{{route('profile.show',$user->id)}}">Questions <span class="badge">{{$user->questions->count()}}</span></a></li>
				<li class="{{ Request::is('comments')?'active':''}}"><a href="">Comments <span class="badge">{{$comments}}</span></a></li>
				<li class="{{ Request::is('fav')?'active':''}}"><a href="">Favorites <span class="badge">{{$favs}}</span></a></li>
			</ul>
			<hr>
		</div>
		<div class="row">
            @foreach($questions as $quest)
            <div class="question-lg row">
            	<div class="col-md-8">
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
                <div class="col-md-4">
                <div class="question-lg-actions pull-right btn-group-vertical">
                	<a href="{{route('questions.edit',$quest->id)}}" class="btn btn-info btn-sm">Edit</a>
                	<a href="{{route('questions.destroy',$quest->id)}}" class="btn btn-danger btn-sm">Delete</a>
                </div>
                </div>
            </div>
            @endforeach
            <p class="text-center">{{$questions->links()}}</p>
		</div>
	</div>
</div>

<!-- name modal-->
<div class="modal fade" role="dialog" id="name-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">
            close
          </button>
          <strong>Change Name </strong> 
        </div>
        <div class="modal-body">
        <form action="{{route('updateName')}}" method="post" id="reply-form">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-12">
            <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{$user->name}}"> 
          </div>
            </div>
            <div class="col-md-12">
            <input type="submit" name="submit" value="save changes" class="btn btn-success btn-block" >
          </div>
          </div>
          
        </form>
        </div>
		 </div>
	</div>	
</div>


<!-- name modal-->
<div class="modal fade" role="dialog" id="username-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">
            close
          </button>
          <strong>Change User Name </strong> 
        </div>
        <div class="modal-body">
        <form action="{{route('updateUserName')}}" method="post" id="reply-form">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-12">
            <div class="form-group">
            <input type="text" name="userName" class="form-control" value="{{$user->userName}}"> 
          </div>
            </div>
            <div class="col-md-12">
            <input type="submit" name="submit" value="save changes" class="btn btn-success btn-block" >
          </div>
          </div>
          
        </form>
        </div>
		 </div>
	</div>	
</div>
@endsection	