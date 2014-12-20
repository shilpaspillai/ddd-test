<?php

Class BookTableSeeder extends Seeder{
    public function run()
    {
      $members = [];
      $members[]=[
      'name' =>'kidsworld',
      'category' => 'story book',
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    ];
     DB::table('books')->insert($members);
    }
}
?>

