<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1=\App\User::create([
            'name'=>'youssef yass',
            'email'=>'sb.ysf1@gmail.com',
            'username'=>'youssef90',
            'password'=>Hash::make('admin123'),
            'avatar'=>'avatar1.jpg'
        ]);
       $user2= \App\User::create([
            'name'=>'yassine mahdi',
            'email'=>'sb.yassine2@gmail.com',
            'username'=>'yassine90',
            'password'=>Hash::make('admin123'),
            'avatar'=>'avatar2.jpg'
        ]);
       $user3= \App\User::create([
            'name'=>'anass foro',
            'email'=>'sb.anass@gmail.com',
            'username'=>'anass90',
            'password'=>Hash::make('admin123'),
            'avatar'=>'avatar3.jpg'
        ]);
          $user4= \App\User::create([
            'name'=>'salima aba',
            'email'=>'sb.salima@gmail.com',
            'username'=>'salima90',
            'password'=>Hash::make('admin123'),
            'avatar'=>'avatar4.jpg'
        ]);
        $user5= \App\User::create([
            'name'=>'amine amani',
            'email'=>'sb.amine@gmail.com',
            'username'=>'amine90',
            'password'=>Hash::make('admin123'),
            'avatar'=>'avatar5.jpg'
        ]);
        $user6= \App\User::create([
          'name'=>'khalid mala',
          'email'=>'sb.khalid@gmail.com',
          'username'=>'khalid90',
          'password'=>Hash::make('admin123'),
          'avatar'=>'avatar6.jpg'
      ]);
       $user7= \App\User::create([
        'name'=>'monaim amil',
        'email'=>'sb.monaim@gmail.com',
        'username'=>'monaim90',
        'password'=>Hash::make('admin123'),
        'avatar'=>'avatar7.jpg'
       ]);
        \App\followship::create([
          'user_id1'=>$user2->id,
          'user_id2'=>1,
        ]);
        \App\followship::create([
            'user_id1'=>$user3->id,
            'user_id2'=>1,
          ]);
          \App\followship::create([
            'user_id1'=>$user4->id,
            'user_id2'=>1,
          ]);
          \App\followship::create([
            'user_id1'=>1,
            'user_id2'=>$user5->id,
          ]);
          \App\followship::create([
            'user_id1'=>1,
            'user_id2'=>$user6->id,
          ]);
          \App\followship::create([
            'user_id1'=>1,
            'user_id2'=>$user7->id,
          ]);
    }

}
