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
            <div class="row back-primary bottom-space-md interaction-block">
              <!-- question votes-->
              <a href="" class="btn social facebook">f</a>
                         <a href="" class="btn social twitter">t</a>
                         <a href="" class="btn social googleplus">g</a>

              
                      
                       <div class="share-btns pull-right">
                        

                        @if(Auth::check())

                        @if(Auth::user()->favorite($question->id))
                        <a href="{{route('favorite.remove',Auth::user()->favorite($question->id))}}" class="btn btn-link">remove favorite</a>
                        @else
                        <a href="{{route('favorite.add',$question->id)}}" class="btn btn-link">add favorite</a>

                        @endif
                        @endif

                         <a href="{{route('vote.question.down',$question->id)}}" class="btn btn-link"> Dislike</a><span class="badge">{{$question->votes->where('value','-1')
                        
                        ->count()}}</span> |
                        <a href="{{route('vote.question.up',$question->id)}}" class="btn btn-link">Like</a>
              <span class="badge">{{$question->votes->where('value','1')
                        ->count()}}</span>
                       </div>
            </div>
            <div class="row back-primary comment-form bottom-space-md">
              <!-- comment form-->
              <form method="post" action="{{route('comments.store',$question->id)}}">
                {{csrf_field()}}
                <div class="form-group">
                  <label>Leave a Comment</label>
                  <textarea class="form-control" name="body" rows="5"></textarea>
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-success">
              </form>
            </div>
            <div class="row">
              <h3>Comments <span class="badge">{{$question->comments->count()}}</span></h3>
              <hr>
              <div class="comments-block">
                
        <ul>
      @foreach($question->comments as $comment)
      <li>
         <div class="comment">
        <div class="comment-info">
                     <img src="{{url('avatar/'.$comment->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted"><a href="{{route('profile.all.show',$comment->user->userName)}}">{{$comment->user->name}}</a> |  {{$comment->created_at->diffForHumans()}}</small>
                     <div class="comment-interaction pull-right">
                      <a href="{{route('comments.reply',$comment->id)}}" class="btn btn-primary reply-btn btn-xs" id="reply-btn">Reply</a>

                       <a href="{{route('vote.comment.down',$comment->id)}}" class="btn btn-link"> Dislike</a><span class="badge">{{$comment->votes->where('value','-1')
                        ->count()}}</span> |
                        <a href="{{route('vote.comment.up',$comment->id)}}" class="btn btn-link">Like</a>
              <span class="badge">{{$comment->votes->where('value','1')
                        ->count()}}</span>
                     </div>

            </div>
            <div class="comment-content">
          {{$comment->body}}
        </div></div>
      
      </li>

      @if(count($comment->comments)>0)
      <?php $id='reply'.$comment->id ;?>

      <a href="#{{$id}}" data-toggle="collapse"><span class="badge">{{count($comment->comments)}}</span> replies<span class="caret"></span></a>
      <ul id="{{$id}}" class="collapse">
      
      @endif

      @foreach($comment->comments as $reply)

      <?php 
      $replyStack = array();
      $replyStack[]=$reply;
      $levels = array();
      while(count($replyStack)>0)
      {
      //dd(array_pop($replyStack));
        if(count($levels)>0)
        {
          $tmp = array_pop($levels);
          $tmp--;
          $levels[]=$tmp;
        }
      $tmpReply = array_pop($replyStack);
      $link =route('comments.reply',$tmpReply->id);
      $user =$tmpReply->user;
   

         echo "<li> <div class=\"comment\">
        <div class=\"comment-info\">
                     <img src=\"".url('avatar/'.$user->avatar)."\" style=\"width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px\">
                     <small class=\"text-muted\"><a href=\"#\">$user->name</a> | ".$tmpReply->created_at->diffForHumans()."</small>
        <a href=\"$link\" class=\"btn btn-primary reply-btn btn-xs pull-right\" id=\"reply-btn\">Reply</a>
            </div>
            <div class=\"comment-content\">
          $tmpReply->body
        </div></div></li>";
           

      if($tmpReply->comments->count()>0)
      {

        $children = $tmpReply->comments->reverse()->all();
        $childCount = count($children);
        $levels[]=$childCount;
         $replyStack = array_merge($replyStack,$children);
        
        $id.='l';
        echo "<a href=\"#$id\" data-toggle=\"collapse\"><span class=\"badge\">$childCount</span> replies<span class=\"caret\"></span></a>
      <ul id=\"$id\" class=\"collapse\">";
      }
      else
      {

        while(last($levels)==0 && count($levels)>0)
        {
          echo '</ul>';
          array_pop($levels);
        }
        
      }

      }
      //echo $closeTag;

      ?>
      
      @endforeach
      @if(count($comment->comments)>0)
      </ul>
      @endif
      @endforeach
      </ul>



              </div>
            </div>

    </div>
   
    <div class="col-md-3 col-md-offset-1">
       @include('questions._recentQuestions');
    </div>
</div>

<div class="modal fade " role="dialog" id="reply-modal">
      <div class="modal-dialog">
        <div class="modal-content">
          
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal">
            close
          </button>
          <h3>your reply</h3> 
        </div>
        <div class="modal-body">        <form action="" method="post" id="reply-form">
          {{csrf_field()}}
          <div class="row">

            <div class="col-md-12">
            <div class="form-group">
            <textarea class="form-control" name="body" id="reply-txt"></textarea> 
          </div>
            </div>
            <div class="col-md-12">
            <input type="submit" name="submit" value="reply" class="btn btn-success btn-block">
          </div>
          </div>
          
        </form>
        </div>

        </div>
      </div>
      </div>
@endsection

@section('additional-scripts')
<script type="text/javascript">
 $(".reply-btn").on('click',function(event){
        event.preventDefault();
        var link = $(event.target).attr('href');
        //$("#reply-txt").val(link);
        $("#reply-form").attr('action',link);
        //console.log('it works');
        $("#reply-modal").modal();
      });
</script>
@endsection