@extends('layout.main')
@section('title',' | Create Question')
@section('content')
<div class="row">
    <div class="col-md-8">
    	<div class="question-form panel panel-default">
    		<div class="panel-heading">
    		<h3>Create New Question</h2>
    		</div>
    		<div class="panel-body">
       <form action="{{route('questions.store')}}" method="post" >
       	<div class="form-group">
       		<label>Title</label>
       		<input type="text" name="title" class="form-control">
       	</div>

       	<div class="form-group">
       		<label>Content</label>
       		<textarea  name="body" class="form-control" rows="10"></textarea> 
       	</div>

       	<div class="form-group">
       		<label>Slug</label>
       		<input type="text" name="slug" class="form-control">
       	</div>

       	<div class="form-group">
       		<label>Tag</label>
       		<input type="text" name="tags[]" class="form-control">
       	</div></div>
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