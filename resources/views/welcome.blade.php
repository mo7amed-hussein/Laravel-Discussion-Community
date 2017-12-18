@extends('layout.main')
@section('title',' | Home')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <ul class="nav nav-pills">
                <li class="active"><a href="">Recent</a></li>
                <li><a href="">Popular</a></li>
                <li><a href="">Intersted</a></li>
            </ul>
            <hr>
        </div>
        <div class="row"> 
            @foreach($questions as $quest)
            <div class="question-lg">
                <p class="title-lg"> <a href="{{route('questions.show',$quest->id)}}" class="text text-primary">{{$quest->title}}</a> </p>
                <div class="question-lg-info">
                     <img src="{{url('avatar/'.$quest->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">{{$quest->user->name}} | asked 33 min ago |3 answers |20 views</small>
                </div>
                <p class="question-tags-lg">
                    @foreach($quest->tags as $tag)
                  <a class="label label-default">{{$tag->name}}</a>
                  @endforeach
                </p>
            </div>
            @endforeach
            <div class="links text-center">
                {{$questions->links()}}
            </div>
        </div>
        
    </div>
    <div class="col-md-3 col-md-offset-1">
       <div class="row text-center">
            <h4><span class="label label-primary">Most Recent Comments</span></h4>
           <hr>
       </div>

       <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('img/avatar.jpg')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">Mohamed Hussein | 33 min ago</small>
                </div>
                <p class="comment-sidebar-content"> <a href="" class="text text-primary">what is the main difference between ...</a> </p>
        </div>

        <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('img/avatar.jpg')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">Mohamed Hussein | 33 min ago</small>
                </div>
                <p class="comment-sidebar-content"> <a href="" class="text text-primary">what is the main difference between ...</a> </p>
        </div>

        <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('img/avatar.jpg')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">Mohamed Hussein | 33 min ago</small>
                </div>
                <p class="comment-sidebar-content"> <a href="" class="text text-primary">what is the main difference between ...</a> </p>
        </div>

        <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('img/avatar.jpg')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">Mohamed Hussein | 33 min ago</small>
                </div>
                <p class="comment-sidebar-content"> <a href="" class="text text-primary">what is the main difference between ...</a> </p>
        </div>

    </div>
</div>
@endsection
