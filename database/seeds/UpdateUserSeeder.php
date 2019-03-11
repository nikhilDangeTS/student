<?php

use Illuminate\Database\Seeder;

class UpdateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')
            ->where('id','222')
            ->update([
            'first_name' => 'Nikhil',
            'last_name' => 'Dange',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            ]);
    }
}
