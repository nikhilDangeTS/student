<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //factory(App\User::class, 50)->create();
        DB::table('student')->insert([
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            ]);

        DB::table('student')
            ->where('id','224')
            ->update([
            'first_name' => 'Nikhil',
            'last_name' => 'Dange',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
            ]);
        // $this->call(UsersTableSeeder::class);
    }
}