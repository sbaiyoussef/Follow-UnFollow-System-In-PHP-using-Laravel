
    <div class="list-group following_you clearfix">
        @if ($data->count()>0)
            @foreach ($data as $item)
                
            
       
        <div class="list-group-item d-inline-block">
            <div class="user_profile_image" style=" background : url('{{asset('assets/img/users/'.$item->user1->avatar)}}');
                            width: 20px;
                            height: 20px;
                            background-size: cover;
                            background-position: center;
                            background-repeat: no-repeat;
                            border-radius: 100px;
                            float: left;
                            margin-right: 20px;
                    "></div>
            <div class="followingship-username float-left">{{$item->user1->name}} </div><button onclick="processData('{{$item->user1->id}}','unfollow',{{$item->user1->id}})" class="float-right following followingship-status">Following</button>
        </div> 
        @endforeach   
       @else
           <div class="no_report_found">
               you don't  currently have any followers
           </div>
       
        @endif
    </div>


    <div class="load_more_section text-center">
        <button> <i class="fa fa-redo"></i> Load more </button>
    </div>



           