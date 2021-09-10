<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'hudzaifah',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin'),
            'role' => 'SUPERADMIN',
        ]);
        DB::table('users')->insert([
            'name' => 'pak gunntoro',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'ADMIN',
        ]);
        DB::table('users')->insert([
            'name' => 'Pak budi',
            'email' => 'watcher@gmail.com',
            'password' => Hash::make('watcher'),
            'role' => 'WATCHER',
        ]);
    }
}
