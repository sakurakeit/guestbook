<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comments')->insert([
            'parent_id' => null,
            'user_id' => 1,
            'message' => 'Message '.str_random(10),
            'created_at' => ' 2017-01-17 20:19:20' ,// now(),
            'updated_at' => ' 2017-01-17 20:19:20' ,
        ]);
        DB::table('comments')->insert([
            'parent_id' => null,
            'user_id' => 1,
            'message' => 'Message '.str_random(10),
            'created_at' => ' 2017-01-17 20:19:20' ,
            'updated_at' => ' 2017-01-17 20:19:20' ,
        ]);
        DB::table('comments')->insert([
            'parent_id' => null,
            'user_id' => 1,
            'message' => 'Message '.str_random(10),
            'created_at' => ' 2017-01-17 20:19:20' ,
            'updated_at' => ' 2017-01-17 20:19:20' ,
        ]);
    }
}
