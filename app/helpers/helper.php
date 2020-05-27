<?php



function isFollowing($id){
     
     if(\App\followship::where('user_id1', $id)->where('user_id2', auth()->user()->id)->exists())
     {
         return'follower';
         
     }
     elseif(\App\followship::where('user_id2', $id)->where('user_id1', auth()->user()->id)->exists())
     {
         return'following';
     }
     else {
         return 'none';
     }
    
}


