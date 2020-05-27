<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     
    <!--style-->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet"> 
    <link href="assets/css/custom.css" rel="stylesheet"> 
    <link href="assets/css/jquery.scrollbar.css" rel="stylesheet"> 
    <link href="assets/css/axios-loader.css" rel="stylesheet">
    <link href="assets/css/notiflix-2.1.3.min.css" rel="stylesheet">

       <!-- Scripts -->
       <script src="{{ asset('js/app.js') }}" defer></script> 
       <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="{{ asset('js/axios.min.js') }}" defer></script>
       <script src="{{ asset('js/axios-loader.js') }}" defer></script>
       <script src="{{ asset('js/jquery-latest.min.js') }}" defer></script>
       <script src="{{ asset('js/jquery.scrollbar.js') }}" defer></script>
       <script src="{{ asset('assets/js/notiflix-2.1.3.min.js') }}" defer></script>

</head>
<body>
    @if($data->count() >0)
    <div class="list-group following_you clearfix">
        @foreach ($data as $item3)
        <div class="list-group-item d-inline-block">
            <div class="user_profile_image" style=" background : url('{{asset('assets/img/users/'.$item3->avatar)}}';
                                    width: 20px;
                                    height: 20px;
                                    background-size: cover;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    border-radius: 100px;
                                    float: left;
                                    margin-right: 20px;
                            "></div>
              <div class="followingship-username float-left">{{$item3->name}} </div>
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
    @else
    <div class="no_report_found">
            Sorry there was no result for your search term - {{$term}}
        </div>
    @endif
                
                 
    
</body>
</html>
