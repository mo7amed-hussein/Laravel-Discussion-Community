@extends('layout.main')
@section('title',' | question view')
@section('content')
<div class="row">
    <div class="col-md-8">
    <div class="row">
    <div class="question-block back-primary bottom-space-md">
                <p class="title-block"><h3>{{$question->title}}</h3></p>
                <div class="question-block-info">
                     <img src="{{url('avatar/'.$question->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted"><a href="{{route('profile.all.show',$question->user->userName)}}">{{$question->user->name}}</a> | asked {{$question->created_at->diffForHumans()}} |3 answers | {{$question->views}} views</small>
                     <hr>
                </div>
                <div class="question-body">
                  {!! $question->body !!}
                  <hr>
                </div>
                <div class="question-tags-block">
                  @foreach($question->tags as $tag)
                  <a class="label label-default" href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a>
                  @endforeach
                </div>
            </div>
            </div>
            <div class="row back-primary bottom-space-md">
              <!-- question votes-->
              Question votes
            </div>
            <div class="row back-primary comment-form bottom-space-md">
              <!-- comment form-->
              <form method="post" action="">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Leave a Comment</label>
                  <textarea class="form-control" name="comment" rows="5"></textarea>
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-success">
              </form>
            </div>
            <div class="row">
              <h3>Comments</h3>
              <hr>
              ...............
            </div>
    </div>
   
    <div class="col-md-3 col-md-offset-1">
       @include('questions._recentQuestions');
    </div>
</div>
@endsection
