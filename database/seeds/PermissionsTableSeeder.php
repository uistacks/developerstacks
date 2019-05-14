<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        \DB::table('permissions')->insert([
            'id' => 1,
            'name' => 'Manage Settings',
            'model' => 'settings',
        ]);

        \DB::table('permissions_trans')->insert([
            'permission_id' => 1,
            'name' => 'Manage Settings',
            'description' => 'settings',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        //2
        \DB::table('permissions')->insert([
            'id' => 2,
            'name' => 'Manage Admin',
            'model' => 'administrator',
        ]);

        \DB::table('permissions_trans')->insert([
            'permission_id' => 2,
            'name' => 'Manage Admin',
            'description' => 'administrator',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        //3
        \DB::table('permissions')->insert([
            'id' => 3,
            'name' => 'Manage Users',
            'model' => 'users',
        ]);

        \DB::table('permissions_trans')->insert([
            'permission_id' => 3,
            'name' => 'Manage Users',
            'description' => 'users',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

    }
}
