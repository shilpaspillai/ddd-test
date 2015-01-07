<?php

 use app\lib\Domain\ValueObjects\Password as Password;
 use Illuminate\Support\Facades\Hash as Hash;


Class UserTableSeeder extends Seeder{
    public function run()
    {
      $members = [];
      $members[]=[
      'username' =>'shilpa',
      'email' => 'shilpa@mail.com',
      'password' =>Hash::make('shilpa'),
       'password_reset_token' => substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4),   
      'role' =>1,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
         $members[]=[
      'username' =>'shyam',
      'email' => 'shyam@mail.com',
      'password' =>Hash::make('shyam'),
      'password_reset_token' => substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4),   
      'role' =>2,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
              $members[]=[
      'username' =>'adarsh',
      'email' => 'adarsh@mail.com',
      'password' =>Hash::make('adarsh'),
      'password_reset_token' => substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4),   
      'role' =>2,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
                         $members[]=[
      'username' =>'testuser',
      'email' => 'testuser@mail.com',
      'password' =>Hash::make('testuser'),
      'password_reset_token' => substr(md5(rand(9,9999)),0,8).'-'.substr(md5(rand(9,9999)),3,4).'-'.substr(md5(rand(9,9999)),6,4),   
      'role' =>2,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
      DB::table('users')->insert($members);
    }
}