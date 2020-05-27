<div id="following" class="tab-pane fade">
    <div class="scrollbar-inner">
    <div class="scrollbar-inner_2">
    <div id="following_show_action">
    <div class="list-group following_you clearfix">
       @if ($following->count()>0)
       @foreach ($following as $item1)
       <div class="list-group-item d-inline-block">
        <div class="user_profile_image" 
        style=" background : url('{{asset('assets/img/users/'.$item1->user2->avatar)}}';
                                width: 20px;
                                height: 20px;
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                                border-radius: 100px;
                                float: left;
                                margin-right: 20px;
                        "></div>
        <div class="followingship-username float-left">{{$item1->user2->name}} </div><button onclick="processData('{{$item1->user2->id}}','removefollow',{{$item1->user2->id}})" class="float-right followed followingship-status">Followed</button>
    </div>
       @endforeach
      
       @else
       <div class="no-report-found">
            you are not following anyone
       </div>
          
       @endif
       
    </div>
    </div>

    </div>
    </div>
</div>