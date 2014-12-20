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
      'role' =>1,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
         $members[]=[
      'username' =>'shyam',
      'email' => 'shyam@mail.com',
      'password' =>Hash::make('shyam'),
      'role' =>2,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
              $members[]=[
      'username' =>'adarsh',
      'email' => 'adarsh@mail.com',
      'password' =>Hash::make('adarsh'),
      'role' =>2,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
                         $members[]=[
      'username' =>'testuser',
      'email' => 'testuser@mail.com',
      'password' =>Hash::make('testuser'),
      'role' =>2,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
      DB::table('users')->insert($members);
    }
}