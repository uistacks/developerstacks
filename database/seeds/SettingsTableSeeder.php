<?php

//namespace Uistacks\Settings\Seeds;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Main Information (1-4)
        \DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'name',
            'value' => 'Aarog'
        ]);
        \DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'address',
            'value' => 'Pune'
        ]);
        \DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'email',
            'value' => 'developer.pipl@gmail.com'
        ]);
        \DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'phone',
            'value' => '02049110303'
        ]);
        // SMTP (5-12)
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'driver',
            'value' => 'smtp'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'host',
            'value' => 'smtp.gmail.com'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'port',
            'value' => '587'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'username',
            'value' => 'PIPL ADMIN'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'password',
            'value' => 'Developer@123'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'address',
            'value' => 'developer.pipl@gmail.com'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'name',
            'value' => 'PIPL ADMIN'
        ]);
        \DB::table('settings')->insert([
            'name' => 'mail',
            'key' => 'encryption',
//            'value' => 'ssl'
            'value' => 'tls'
        ]);
        // Social Accounts (13-16)
        \DB::table('settings')->insert([
            'name' => 'social_accounts',
            'key' => 'facebook',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'social_accounts',
            'key' => 'twitter',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'social_accounts',
            'key' => 'gplus',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'social_accounts',
            'key' => 'instagram',
            'value' => ''
        ]);
        // Mobile Applications Links (17-18)
        \DB::table('settings')->insert([
            'name' => 'app_links',
            'key' => 'apple',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'app_links',
            'key' => 'google',
            'value' => ''
        ]);
        // SEO (19-20)
        \DB::table('settings')->insert([
            'name' => 'seo',
            'key' => 'keywords',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'seo',
            'key' => 'description',
            'value' => ''
        ]);
        // SEO (21)
        \DB::table('settings')->insert([
            'name' => 'fcm',
            'key' => 'server_key',
            'value' => ''
        ]);
        // SEO (22-25)
        \DB::table('settings')->insert([
            'name' => 'sms',
            'key' => 'url',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'sms',
            'key' => 'username',
            'value' => 'apple'
        ]);
        \DB::table('settings')->insert([
            'name' => 'sms',
            'key' => 'password',
            'value' => '123456'
        ]);
        \DB::table('settings')->insert([
            'name' => 'sms',
            'key' => 'sender',
            'value' => 'apple'
        ]);
        // Maintanance Mode Settings (26)
        \DB::table('settings')->insert([
            'name' => 'maintanance_mode',
            'key' => 'active',
            'value' => '0'
        ]);

        // Social Accounts ++
        \DB::table('settings')->insert([
            'name' => 'social_accounts',
            'key' => 'youtube',
            'value' => ''
        ]);
        \DB::table('settings')->insert([
            'name' => 'info',
            'key' => 'is_multilingual',
            'value' => ''
        ]);
    }
}
