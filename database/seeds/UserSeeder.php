<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regular_user = Role::where('name', 'regular_user')->first();
        $admin = Role::where('name', 'administrator')->first();

        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();
        
        $user1 = new User();
        $user1->name = 'Lidija';
        $user1->email = 'lilovenar@gmail.com';
        $user1->password = bcrypt('123123123');
        $user1->save();
        $user1->roles()->attach($regular_user);

       // User::firstOrCreate([


        $user2 = new User();
        $user2->name = 'admin';
        $user2->email = 'admin@gmail.com';
        $user2->password = bcrypt('123123123');
        $user2->save();
        $user2->roles()->attach($admin);
    }
}
