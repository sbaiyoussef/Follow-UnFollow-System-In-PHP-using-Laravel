 
<div class="list-group following_you clearfix">
                
    @foreach ($user as $item3)
    <div class="list-group-item d-inline-block">
        

        <div class="user_profile_image" style=" background : url('{{asset('img/users/'.$item3->avatar)}}';
                                width: 20px;
                                height: 20px;
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                                border-radius: 100px;
                                float: left;
                                margin-right: 20px;
                        "></div>
          <div class="followingship-username float-left">{{$item3->name}}</div>
           @if(isFollowing($item3->id)=='following') 
          <button class="float-right followed followingship-status" onclick="processData('{{$item3->id}}','removefollow',{{$item3->id}})">followed</button>
          @elseif(isFollowing($item3->id)=='follower') 
          <button class="float-right followed followingship-status"  onclick="processData('{{$item3->id}}','unfollow',{{$item3->id}})">following</button>
           @else  
           <button class="float-right followed followingship-status"  onclick="processData('{{$item3->id}}','follow',{{$item3->id}})">follow</button>
           @endif 
    </div>
    @endforeach
</div>


