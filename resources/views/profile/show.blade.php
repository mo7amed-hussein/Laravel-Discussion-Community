@extends('layout.main')
@section('title',' | $user->name')
@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
		<div class="user-info back-primary">
		<img src="{{url('avatar/'.$user->avatar)}}" style="">
		<h4>{{$user->name}}</h4>
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
				<li class="active"><a href="">Questions</a></li>
				<li ><a href="">Comments</a></li>
				<li ><a href="">Favorites</a></li>
			</ul>
			<hr>
		</div>
		<div class="row">
			<div class="question-lg">
                <p class="title-lg"> <a href="" class="text text-primary">what is the main difference between qt and qml</a> </p>
                <div class="question-lg-info">
                     <small class="text-muted">asked 33 min ago |3 answers |20 views</small>
                </div>
                <p class="question-tags-lg">
                    <a class="label label-default">qt</a>
                    <a class="label label-default">qml</a>
                    <a class="label label-default">cpp</a>
                </p>
            </div>

            <div class="question-lg">
                <p class="title-lg"> <a href="" class="text text-primary">what is the main difference between qt and qml</a> </p>
                <div class="question-lg-info">
                     <small class="text-muted">asked 33 min ago |3 answers |20 views</small>
                </div>
                <p class="question-tags-lg">
                    <a class="label label-default">qt</a>
                    <a class="label label-default">qml</a>
                    <a class="label label-default">cpp</a>
                </p>
            </div>

            <div class="question-lg">
                <p class="title-lg"> <a href="" class="text text-primary">what is the main difference between qt and qml</a> </p>
                <div class="question-lg-info">
                     <small class="text-muted">asked 33 min ago |3 answers |20 views</small>
                </div>
                <p class="question-tags-lg">
                    <a class="label label-default">qt</a>
                    <a class="label label-default">qml</a>
                    <a class="label label-default">cpp</a>
                </p>
            </div>

            <div class="question-lg">
                <p class="title-lg"> <a href="" class="text text-primary">what is the main difference between qt and qml</a> </p>
                <div class="question-lg-info">
                     <small class="text-muted">asked 33 min ago |3 answers |20 views</small>
                </div>
                <p class="question-tags-lg">
                    <a class="label label-default">qt</a>
                    <a class="label label-default">qml</a>
                    <a class="label label-default">cpp</a>
                </p>
            </div>
		</div>
	</div>
</div>
@endsection	