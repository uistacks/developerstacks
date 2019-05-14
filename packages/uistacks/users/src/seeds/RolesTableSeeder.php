<?php
namespace Uistacks\Users\Seeds;

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
    	// Visitor Role 1
        \DB::table('roles')->insert([
        	'id' => 1,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 1,
            'title' => 'Visitor',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 1,
            'title' => 'زائر',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Visitor Role

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

        \DB::table('roles_trans')->insert([
            'role_id' => 2,
            'title' => 'المطور',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Developer Role

        // Adminstrator Role 3
        \DB::table('roles')->insert([
        	'id' => 3,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 3,
            'title' => 'Manager',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 3,
            'title' => 'مدير',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Adminstrator User Role

        // admin User Role 4
        \DB::table('roles')->insert([
            'id' => 4,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 4,
            'title' => 'Admin',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 4,
            'title' => 'مشرف',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End admin User Role

        // Registered User Role 4
        \DB::table('roles')->insert([
            'id' => 5,
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 5,
            'title' => 'Member',
            'lang' => 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('roles_trans')->insert([
            'role_id' => 5,
            'title' => 'مشترك',
            'lang' => 'ar',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);
        // End Registered User Role
    }
}
