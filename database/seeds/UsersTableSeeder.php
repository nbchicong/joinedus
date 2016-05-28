<?php
/**
 * Copyright (c) 2016 CT1905
 * Created by Nguyen Ba Chi Cong <nbchicong@gmail.com>
 * Date: 27/05/2016
 * Time: 6:04 AM
 * ---------------------------------------------------
 * Project: laravel
 * @name: UserTableSeeder.php
 * @package: ${NAMESPACE}
 * @author: nbchicong
 */

/**
 * Class UserTableSeeder
 */
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder{
  public function run() {
    User::create(array(
        'name'     => 'Nguyễn Bá Chí Công',
        'email'    => 'nbchicong@gmail.com',
        'password' => Hash::make('nbchicong1311'),
    ));
  }
}