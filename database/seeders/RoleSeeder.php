<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
           'name' => 'admin',
           'display_name' => 'Admin',
           'description' => "System Administrator",
            'allowed_route' => 'admin'
        ]);

        $editorRole = Role::create([
            'name' => 'editor',
            'display_name' => 'Editor',
            'description' => "System Supervisor",
            'allowed_route' => 'admin'
        ]);

        $userRole = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => "Normal User",
            'allowed_route' => null
        ]);

        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'mobile' => '01010203001',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => '1',
        ]);

        $admin->attachRole($adminRole);

        $editor = User::create([
            'name' => 'editor',
            'username' => 'editor',
            'email' => 'editor@editor.com',
            'mobile' => '01010203002',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => '1',
        ]);

        $editor->attachRole($editorRole);


        $user = User::create([
            'name' => 'Ahmad',
            'username' => 'ahmad',
            'email' => 'ahmad@ahmad.com',
            'mobile' => '01092991713',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => '1',
        ]);

        $user->attachRole($userRole);

        $user1 = User::create([
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@user.com',
            'mobile' => '01010203003',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => '1',
        ]);

        $user1->attachRole($userRole);

        $user2 = User::create([
            'name' => 'Ali',
            'username' => 'ali',
            'email' => 'ali@ali.com',
            'mobile' => '01010203005',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('123456'),
            'status' => '1',
        ]);

        $user2->attachRole($userRole);


        for($i = 0;$i < 20 ; $i++){
            $user = User::create([
                'name' => fake()->name(),
                'username' => fake()->userName(),
                'email' => fake()->safeEmail(),
                'mobile' => fake()->phoneNumber(),
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('123456'),
                'status' => '1',
            ]);
            $user->attachRole($userRole);

        }





    }
}
