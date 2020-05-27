<?php

namespace App\Http\Controllers;

use App\followship;
use App\notification;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $followers=followship::where('user_id2',auth()->user()->id)->get();
        $following=followship::where('user_id1',auth()->user()->id)->get();
        $notification=notification::where('user_id',auth()->user()->id)->get();
        $user=User::get();

        return view('index',compact('followers','following','notification','user'));
    }
    public function checkNotification(){
       $notification=notification::where('user_id',auth()->user()->id)->get();
       return response()->json(['data'=>$notification->count()]);
    }
    public function reloadfollowers(){
        $data=followship::where('user_id2',auth()->user()->id)->get();
        return response()->view('followers-action',compact('data'));
    }
     public function search(Request $request){
          $term=$request->term;
          $data=User::where('name','LIKE','%'.$term.'%')->get();
          return response()->view('partial.people-search',compact('data','term'));
     }
     public function useraction(Request $request){
         if($request->action=='unfollow'){
            if(followship::where('user_id1','!=',auth()->user()->id)->where('user_id2',auth()->user()->id)->exists()){
             $data=followship::where('user_id1','!=',auth()->user()->id)->where('user_id2',auth()->user()->id)->first();
             $data->delete();
             $data=followship::where('user_id1','!=',auth()->user()->id)->where('user_id2',auth()->user()->id)->get();
             return response()->view('partial.followers-action',compact('data'));
            }else{
             return response()->json(['data'=>'sorry,enable to process data']);
         }
        }
        elseif($request->action=='removefollow'){
            if(followship::where('user_id1',auth()->user()->id)->where('user_id2','!=',auth()->user()->id)->exists()){
                $data=followship::where('user_id1',auth()->user()->id)->where('user_id2','!=',auth()->user()->id)->first();
                $data->delete();
                $data=followship::where('user_id1',auth()->user()->id)->where('user_id2','!=',auth()->user()->id)->get();
                return response()->view('partial.following-action',compact('data'));
               }else{
                return response()->json(['data'=>'sorry,enable to process data'],422);
            }
        }
        elseif($request->action=='reload_people'){
            $user=User::get();
            return response()->view('partial.reload-people',compact('user'));
        }
        elseif($request->action=='follow'){
            if(followship::where('user_id1',auth()->user()->id)->where('user_id2',$request->user_id)->exists()){
                return response()->json(['data'=>'sorry,enable to perform action'],422);
            }
            else{
                $notify=new notification();
                $notify->user_id=$request->user_id;
                $notify->title='You have a new follower';
                $notify->content='You have a new follower';
                $notify->save();
                
                $data=new followship();
                $data->user_id1=auth()->user()->id;
                $data->user_id2=$request->user_id;
                $data->save();
                $data=followship::where('user_id1',auth()->user()->id)->where('user_id2','!=',auth()->user()->id)->get();
                return response()->view('partial.following-action',compact('data'));
   
            }

        }
        else{
            return response()->json(['data'=>'sorry,enable to perform action'],422);
        }
     }
}
