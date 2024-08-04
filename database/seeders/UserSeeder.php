<?php

namespace Database\Seeders;

use File;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/users.json');
        $users = json_decode($json);

        foreach ($users as $user) {
            \DB::table('users')->insert([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'nip' => $user->nip,
                'password' => $user->password,
                'image' => $user->image,
                'phone_number' => $user->phone_number,
                'remember_token' => $user->remember_token,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
                'is_admin' => $user->is_admin
            ]);
        }
    }
}
