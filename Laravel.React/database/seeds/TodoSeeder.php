<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')-> insert ([
            ['memo'=> 'test','status'=>'0'],
            ['memo'=> 'must','status'=>'1']
            ]);
    }
}
