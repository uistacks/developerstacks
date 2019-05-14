<?php
//namespace Uistacks\Users\Seeds;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Adminstrator Role 1
        \DB::table('roles')->insert([
        	'id' => 1,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 1,
            'title' => 'Adminstrator',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        // End Adminstrator Role

    	// Developer Role 2
        \DB::table('roles')->insert([
        	'id' => 2,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 2,
            'title' => 'Developer',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        // End Developer Role

        // Visitor/Member Role 3
        \DB::table('roles')->insert([
        	'id' => 3,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 3,
            'title' => 'User',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        // End Visitor/Member User Role

    }
}
