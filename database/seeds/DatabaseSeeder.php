<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Nguyễn Bá Chí Công',
            'email'    => 'nbchicong@gmail.com',
            'password' => bcrypt('nbchicong1311'),
        ]);
//         $this->call(UsersTableSeeder::class);
    }
}
