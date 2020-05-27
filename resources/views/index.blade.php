@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="itemise_inner">
                    <div class="profile_section_inner" style="padding-top: 40px;">
                        <div class="user_profile_image" style="background : url('{{asset('assets/img/users/'.auth()->user()->avatar)}}'); 
                                width: 100px;
                                height: 100px;
                                background-position: center;
                                background-size: contain;
                                border-radius: 100%;
                                border: 2px solid #f4f4f4;
                                margin: 0 auto;
                                margin-bottom: 30px;">
                        </div>
                        <div class="user_profile_name text-center">
                        <h2> {{auth()->user()->name}}</h2>
                        </div>
                    </div>
                    <div class="profile_info_section">
                        <section class="container py-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul id="tabs" class="nav nav-tabs nav-justified">
                                        <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase  active">Profile</a></li>
                                        <li class="nav-item"><a href="" data-target="#followers" data-toggle="tab" class="nav-link small text-uppercase">Followers</a></li>
                                        <li class="nav-item"><a href="" data-target="#following" data-toggle="tab" class="nav-link small text-uppercase">Following</a></li>
                                    <li class="nav-item"><a href="" data-target="#people" data-toggle="tab" class="nav-link small text-uppercase">People ({{$user->count()}})</a></li>
                                    </ul>
                                    <br>
                                    <div id="tabsContent" class="tab-content">
                                       <input type="hidden" id="notificationcount" value="{{$notification->count()}}">
                                      @include('partial.dashboard',compact('notification','followers','following'))
                                      @include('partial.followers',compact('followers'))
                                      @include('partial.following',compact('following'))
                                      @include('partial.people',compact('user'))
                                      
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @endsection

     @section('script')
         <script>
      $(document).on('keyup','#usersearch',function(event){
           event.preventDefault();
           let data=$('#usersearchinput').val();
           axios.get("{{route('search')}}",{
               params:{
                   term:data
               },
               
               validateStatus: (status) => {
        return true; 
      }
           }).then(data=>{
               $('#searchResult').html(data.data);
            
           }).catch(error => { 
               console.log(error.message);
           })

      })

      function processData(selector,action,user_id){
          let user_action='';
          if(action=='unfollow'){
              user_action='are you sure you want to stop this user from following you?';
          }
          else if(action=='removefollow'){
            user_action='are you sure you want to unfollow this user?';

          }
          else{
              user_action='you want to follow this user?';
          }
          Notiflix.Confirm.Show('Attention',user_action,'Yes','No',function(){ 
              axios.get("{{route('useraction')}}",{
                  params:{
                      action:action,
                      user_id:user_id
                  },
                  validateStatus: (status) => {
                    return true; 
                  }
              }).then(data=>{
                  if(action=='unfollow'){
                    $('#followers-show-action').html(data.data);
                  }else if(action=='removefollow'){
                    $('#following_show_action').html(data.data);
                  }
                  else{
                    $('#following_show_action').html(data.data);
                      }
                  reloadPoeple()
                 
              }).catch(error=>{
                  console.log(error.message);
              })
             },function(){ 
                  //no
             });
          }
          function reloadPoeple(){
            axios.get("{{route('useraction')}}",{
                  params:{
                      action:'reload_people',
                      
                  },
                  validateStatus: (status) => {
                    return true; 
                  }
              }).then(data=>{
                 $('#searchResult').html(data.data);
                 
              }).catch(error=>{
                  console.log(error.message);
              })
          }
          function checkNotification(){
              let statut=false;
              let notification=$('#notificationcount').val();
              setInterval(function(){
                  axios.get("{{route('checkNotification')}}",{
                      params:{
                        count:notification,
                      },
                      validateStatus: (status) => {
                    return true; 
                       }
                  }).then(data=>{
                      if(data.data > notification){
                        $('#notificationcount').val(data.data);
                          console.log('you have a new notification');
                          if(status==false){
                              let song=new Audio();
                              song.src="{{asset('assets/file/just-saying.mp3')}}";
                              song.play();
                              status=true;
                          }
                      }
                  }).catch(error=>{
                  console.log(error.message);
                  })
              },4000);
          }
           
          checkNotification();

          $(document).ready(function() {
            $('.scrollbar-inner').scrollbar();
        });

        function reloadfollowers() {
            axios.get("{{route('reloadfollowers')}}").then(
             data=>{
                 $('#followers-show-action').html(data.data);
             }
            )
          }
         </script>
    @endsection 
