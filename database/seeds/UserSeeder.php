<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'miky',
            'email' => 'miky@miky.it',
            'password' => Hash::make('pippo1234'),
        ]);
    }
}
