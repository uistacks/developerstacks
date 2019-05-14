<?php
namespace Uistacks\Locations\Seeds;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Countries
        \DB::table('countries')->insert([
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('countries_trans')->insert([
            'name' => 'India',
            'iso_code' => 'in',
            'iso3' => 'IND',
            'phone_code' => '+91',
            'country_id' => 1,
            'flag'=> 'in.png',
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('countries')->insert([
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('countries_trans')->insert([
            'name' => 'Unites States',
            'iso_code' => 'us',
            'iso3' => 'USA',
            'phone_code' => '+1',
            'country_id' => 2,
            'flag'=> 'us.png',
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        // States
        \DB::table('states')->insert([
            'country_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('states_trans')->insert([
            'name' => 'Maharashtra',
            'state_id' => 1,
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('states')->insert([
            'country_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('states_trans')->insert([
            'name' => 'Bihar',
            'state_id' => 2,
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('states')->insert([
            'country_id' => 2,
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('states_trans')->insert([
            'name' => 'Ca',
            'state_id' => 3,
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);


        // Cities
        \DB::table('cities')->insert([
            'country_id' => 1,
            'state_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('cities_trans')->insert([
            'name' => 'Pune',
            'city_id' => 1,
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('cities')->insert([
            'country_id' => 1,
            'state_id' => 2,
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('cities_trans')->insert([
            'name' => 'Patna',
            'city_id' => 2,
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('cities')->insert([
            'country_id' => 2,
            'state_id' => 3,
            'created_by' => 1,
            'updated_by' => 1,
            'active'=> 1,
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

        \DB::table('cities_trans')->insert([
            'name' => 'Ojai',
            'city_id' => 3,
            'lang'=> 'en',
            'created_at' => Carbon::now()->format('Y-m-d'),
            'updated_at' => Carbon::now()->format('Y-m-d'),
        ]);

    }
}
