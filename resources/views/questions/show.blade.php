@extends('layout.main')
@section('title',' | question view')
@section('content')
<div class="row">
    <div class="col-md-8">
    <div class="row">
    <div class="question-block back-primary bottom-space-md">
                <p class="title-block"><h3>{{$question->title}}</h3></p>
                <div class="question-block-info">
                     <img src="{{url('img/avatar.jpg')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">Mohamed Hussein | asked {{date('M j ,Y',strtotime($question->created_at))}} |3 answers |{{$question->views}} views</small>
                     <hr>
                </div>
                <div class="question-body">
                  {!! $question->body !!}
                  <hr>
                </div>
                <div class="question-tags-block">
                  @foreach($question->tags as $tag)
                  <a class="label label-default">{{$tag->name}}</a>
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
       <div class="row text-center">
            <h4><span class="label label-primary">Most Recent Questions</span></h4>
           <hr>
       </div>
       @foreach($recentQuestions as $quest)
       <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('img/avatar.jpg')}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">Mohamed Hussein |{{date('M j ,Y',strtotime($quest->created_at))}}</small>
                </div>
                <p class="comment-sidebar-content"> <a href="{{route('questions.show',$quest->id)}}" class="text text-primary">{{str_limit($quest->title,20)}}</a> </p>
        </div>

        @endforeach
    </div>
</div>
@endsection
