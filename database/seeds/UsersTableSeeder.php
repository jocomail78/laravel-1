<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    function randomPhoneNumber() {
        $requiredLength = 7;
        $highestDigit = 9;
        $sequence = '';
        for ($i = 0; $i < $requiredLength; ++$i) {
            $sequence .= mt_rand(0, $highestDigit);
        }

        $numberPrefixes = ['036', '072', '073', '074'];

        return $numberPrefixes[array_rand($numberPrefixes)].$sequence;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Admin user ',
            'email' => 'electrum89+admin@gmail.com',
            'phone' => $this->randomPhoneNumber(),
            'password' => bcrypt('Test1234!'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'terms_accepted_at' => date('Y-m-d H:i:s'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'status' => 1,
        ]);

        for($i=0;$i<10;$i++){

            DB::table('users')->insert([
                'name' => 'Seed user '.Str::random(10),
                'email' => 'electrum89+'.Str::random(10).'@gmail.com',
                'phone' => $this->randomPhoneNumber(),
                'password' => bcrypt('Test1234!'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'terms_accepted_at' => date('Y-m-d H:i:s'),
                'email_verified_at' => date('Y-m-d H:i:s'),
                'status' => 1,
            ]);
        }

    }
}
