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
        $moderator = Role::where('name', 'moderator')->first();
        $admin = Role::where('name', 'administrator')->first();

        DB::statement("SET foreign_key_checks = 0");
        DB::table('users')->truncate();
        
        $user1 = new User();
        $user1->name = 'Lidija';
        $user1->email = 'lilovenar@gmail.com';
        $user1->password = bcrypt('123123123');
        $user1->save();
        $user1->roles()->attach($regular_user);

        $user2 = new User();
        $user2->name = 'moderator';
        $user2->email = 'moderator@gmail.com';
        $user2->password = bcrypt('123123123');
        $user2->save();
        $user2->roles()->attach($moderator);

        $user3 = new User();
        $user3->name = 'admin';
        $user3->email = 'admin@gmail.com';
        $user3->password = bcrypt('123123123');
        $user3->save();
        $user3->roles()->attach($admin);    
        
        // User::firstOrCreate([
    }
}
