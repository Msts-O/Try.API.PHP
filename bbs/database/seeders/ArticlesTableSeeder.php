<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('articles')->insert(
        [
          [
            'title'=>'test',
            'description'=>'this_is_test. ',
            'password'=>'test1234',
            'date' => date('Y-m-d H:i:s')
          ],
        ]
      );
    }
}
