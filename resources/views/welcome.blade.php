@extends('layout.main')
@section('title',' | Home')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <ul class="nav nav-pills">
                <li class="{{ Request::is('/')?'active':''}}"><a href="{{route('home')}}">Recent</a></li>
                <li class="{{ Request::is('popular')?'active':''}}"><a href="{{route('home.popular')}}">Popular</a></li>
                <li class="{{ Request::is('rated')?'active':''}}"><a href="{{route('home.rated')}}">Best</a></li>
            </ul>
            <hr>
        </div>
        <div class="row"> 
            @foreach($questions as $quest)
            <div class="question-lg">
                <p class="title-lg"> <a href="{{route('question.all.show',$quest->slug)}}" class="text text-primary">{{$quest->title}}</a> </p>
                <div class="question-lg-info">
                     <img src="{{url('avatar/'.$quest->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted"><a href="{{route('profile.all.show',$quest->user->userName)}}">{{$quest->user->name}}</a> | asked {{$quest->created_at->diffForHumans()}} |{{$quest->comments->count()}} answers |{{$quest->views}} views</small>
                </div>
                <div class="question-tags-lg">
                    @foreach($quest->tags as $tag)
                  <a class="label label-default" href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a>
                  @endforeach
                </div>
            </div>
            @endforeach
            <div class="links text-center">
                {{$questions->links()}}
            </div>
        </div>
        
    </div>
    <div class="col-md-3 col-md-offset-1">
       <div class="row text-center">
            <h4><span class="label label-primary label-main">Most Recent Comments</span></h4>
           <hr>
       </div>
       <div class="row">
        @foreach($comments as $comment)
        <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('avatar/'.$comment->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted"><a href="{{route('profile.all.show',$comment->user->userName)}}">{{$comment->user->name}}</a> | {{$comment->created_at->diffForHumans()}}</small>
                </div>
                <p class="comment-sidebar-content"> <a href="{{route('question.all.show',$comment->commentable->slug)}}" class="text text-primary"> {{str_limit($comment->body,50)}}</a> </p>
        </div>
        @endforeach
        <hr>
        </div>
    </div>
</div>
@endsection
