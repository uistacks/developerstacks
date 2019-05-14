<?php
namespace Uistacks\Users\Seeds;

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
            'name' => 'Uistacks',
            'email' => 'admin@uistacks.com',
            'phone' => '010022118245',
            'country_id' => 1,
            'area_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('admin@2017'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 3,
            'user_id'=> 1
        ]);


        \DB::table('users')->insert([
            'name' => 'Super Admin',
            'email' => 'admin@sel3a.dev',
            'phone' => '010022118249',
            'country_id' => 1,
            'area_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'password' => bcrypt('admin_cms@2017'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 3,
            'user_id'=> 2
        ]);

        // Mock Memebers
        \DB::table('users')->insert([
            'name' => 'محمود هلال',
            'email' => 'm.eid@uistacks.com',
            'email_show' => 1,
            'phone' => '01002211824',
            'phone_show' => 1,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('aaaddd'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 4,
            'user_id'=> 3
        ]);

        \DB::table('users')->insert([
            'name' => 'ابراهيم الأبيض',
            'email' => 'ibrahim@example.com',
            'email_show' => 0,
            'phone' => '251234568',
            'phone_show' => 0,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('aaaddd'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 5,
            'user_id'=> 4
        ]);

        \DB::table('users')->insert([
            'name' => 'حسام الدين',
            'email' => 'Hosam@example.com',
            'email_show' => 0,
            'phone' => '36251234568',
            'phone_show' => 0,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('aaaddd'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 5,
            'user_id'=> 5
        ]);

        \DB::table('users')->insert([
            'name' => 'جمال صبحي',
            'email' => 'sobhy@example.com',
            'email_show' => 1,
            'phone' => '65441234568',
            'phone_show' => 1,
            'country_id' => 1,
            'area_id' => 1,
            'password' => bcrypt('aaaddd'),
            'confirmed'=> 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);

        \DB::table('users_roles')->insert([
            'role_id' => 5,
            'user_id'=> 6
        ]);

    }
}
