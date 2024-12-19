<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class add_users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'nipp' => '68088',
            'role' => 'Admin',
            'unit_kerja' => 'ADMIN',
            'id_img' => 'admin/1.png',
            'tlpn' => '085324385200',
            'email' => '68088' . '@kai.id',
            'password' => Hash::make('68088'),

        ]);

        DB::table('users')->insert([
            'name' => 'SPV',
            'nipp' => '67077',
            'role' => 'Spv',
            'unit_kerja' => 'QC',
            'id_img' => 'spv/1.png',
            'tlpn' => '085324385201',
            'email' => '67077' . '@kai.id',
            'password' => Hash::make('67077'),

        ]);

        DB::table('users')->insert([
            'name' => 'OFFICER',
            'nipp' => '69099',
            'role' => 'Officer',
            'unit_kerja' => 'PRODUKSI',
            'id_img' => 'officer/1.png',
            'tlpn' => '085324385202',
            'email' => '69099' . '@kai.id',
            'password' => Hash::make('69099'),

        ]);
    }
}
