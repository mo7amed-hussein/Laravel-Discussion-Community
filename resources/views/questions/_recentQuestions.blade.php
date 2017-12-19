<div class="row text-center">
            <h4><span class="label label-primary label-main">Most Recent Questions</span></h4>
           <hr>
       </div>
       <div class="row">
       @foreach($recentQuestions as $quest)
       <div class="comment-sidebar">
              <div class="question-lg-info">
                     <img src="{{url('avatar/'.$quest->user->avatar)}}" style="width: 30px; height: 30px;border-radius: 50%;display: inline;margin: 0px; margin-right: 5px">
                     <small class="text-muted"><a href="{{route('profile.all.show',$quest->user->userName)}}">{{$quest->user->name}}</a>  |{{$quest->created_at->diffForHumans()}}</small>
                </div>
                <div class="comment-sidebar-content"> <a href="{{route('question.all.show',$quest->slug)}}" class="text text-primary">{{str_limit($quest->title,50)}}</a> </div>
        </div>

        @endforeach
        <hr>
        </div>