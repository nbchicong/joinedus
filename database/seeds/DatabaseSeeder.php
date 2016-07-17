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
        $user = DB::table('users')->where('email', 'nbchicong@gmail.com')->first();
        if (!$user)
            DB::table('users')->insert([
                'name'     => 'Nguyễn Bá Chí Công',
                'email'    => 'nbchicong@gmail.com',
                'role'     => 'SUPER_ADMIN',
                'password' => Hash::make('nbchicong1311'),
            ]);
        DB::table('site_config')->insert([
            'id'       => \App\Utils\StringUtils::generateUuid(),
            'siteName' => 'Shop Khỉ Con',
            'siteCode' => 'shop-khi-con',
            'author'   => 'Shop Khỉ Con',
            'status'   => 1,
        ]);
//         $this->call(UsersTableSeeder::class);
    }
}
