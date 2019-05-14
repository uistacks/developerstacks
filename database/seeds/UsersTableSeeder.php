<?php
//namespace Uistacks\Users\Seeds;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ِAdmins
        \DB::table('users')->insert([
            'name' => 'Main Admin',
            'email' => 'admin@uistacks.com',
            'phone' => '9762137636',
            'gender' => '1',
            'dob' => '1992-08-17',
            'country_id' => 101,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('Pass@2019'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 1,
            'user_id'=> 1
        ]);


        \DB::table('users')->insert([
            'name' => 'Sub Admin',
            'email' => 'subadmin@uistacks.com',
            'phone' => '9988776644',
            'gender' => '1',
            'dob' => '1992-08-17',
            'country_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('Pass@2019'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 1,
            'user_id'=> 2
        ]);
        //developer
        \DB::table('users')->insert([
            'name' => 'Developer Pipl',
            'email' => 'developer@panaceatek.com',
            'phone' => '9988776644',
            'gender' => '1',
            'dob' => '1992-08-17',
            'country_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('Pass@2019'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 2,
            'user_id'=> 3
        ]);

        // Mock Memebers
        \DB::table('users')->insert([
            'name' => 'User Name',
            'email' => 'ramesh@uistacks.com',
            'email_show' => 1,
            'gender' => '1',
            'dob' => '1992-08-17',
            'phone' => '9797974564',
            'phone_show' => 1,
            'country_id' => 1,
            'password' => bcrypt('Pass@2019'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 3,
            'user_id'=> 4
        ]);

    }
}
