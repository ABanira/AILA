<?php

namespace Database\Seeders;

use Dotenv\Util\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'name' => 'Admin',
            'nipp' => '68088',
            'jabatan' => 'ADMIN',
            'tlpn' => '085324385200',
            'email' => '68088'.'@kai.id',
            'password' => Hash::make('68088'),
        ]);
    }
}
