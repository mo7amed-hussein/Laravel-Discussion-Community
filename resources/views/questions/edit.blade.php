@extends('layout.main')
@section('title',' | question edit')
@section('additional-styles')
<link rel="stylesheet" type="text/css" href="{{url('css/select2.min.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
   <div class="question-form panel panel-default">
        <div class="panel-heading">
        <h3>Edit Question</h2>
        </div>
        <div class="panel-body">
       <form action="{{route('questions.update',$question->id)}}" method="PUT" >
        {{csrf_field()}}
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control" required value="{{$question->title}}">
        </div>

        <div class="form-group">
          <label>Content</label>
          <textarea  name="body" class="form-control" rows="10">{{$question->body}}</textarea> 
        </div>

        <div class="form-group">
          <label>Slug</label>
          <input type="text" name="slug" class="form-control" required value="{{$question->slug}}">
        </div>

        <div class="form-group">
          <label>Tag</label>
          <select name="tags[]" multiple="multiple" class="form-control tags-selector">
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
          </select>
        </div>
       </div>
        <div class="panel-footer">
        
        <input type="submit" name="submit" value="submit" class="btn btn-success btn-block">
        
       </form></div>

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
                     <img src="{{url('avatar/'.$quest->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted">{{$quest->user->name}} |{{date('M j ,Y',strtotime($quest->created_at))}}</small>
                </div>
                <p class="comment-sidebar-content"> <a href="{{route('questions.show',$quest->id)}}" class="text text-primary">{{str_limit($quest->title,50)}}</a> </p>
        </div>

        @endforeach
    </div>
</div>
@endsection

@section('additional-scripts')
<script src="{{url('js/select2.min.js')}}"></script>
<script src="{{url('js/tinymce.min.js')}}"></script>
<script type="text/javascript">
  tinymce.init({selector:'TEXTAREA' ,plugins:'link code lists table colorpicker'});
  $(".tags-selector").select2();
  $(".tags-selector").select2().val({{json_encode($question->tags()->allRelatedIds())}}).trigger('change');
  
</script>
@endsection