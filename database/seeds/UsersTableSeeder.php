<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::Truncate();

        $data = [
            [
                'name' => 'Abou',
                'role' => 'admin',
                'email' => 'labs@admin.com',
                'password' => bcrypt('58626682')
            ],
            [
                'name' => 'Tanguy',
                'role' => 'editeur',
                'email' => 'editeur@gmail.com',
                'password' => bcrypt('58626682')
            ],
            [
                'name' => 'Guest',
                'role' => 'guest',
                'email' => 'john@guest.com',
                'password' => bcrypt('58626682')
            ]
            ];

        DB::table('users')->insert($data);
        
    }
}
