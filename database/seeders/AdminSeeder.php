<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Admin';
        $user->password = Hash::make('password');
        $user->email = 'admin@ker.com';
        $user->address = [

            'city' => 'Cochin',
            'address' => '2nd Line',
            'country' => 'IN'

        ];

        $user->status = 1;
        $user->save();
    }
}
