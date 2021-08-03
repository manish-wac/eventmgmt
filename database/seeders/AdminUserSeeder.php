<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new AdminUser;
        $user->name = 'Admin';
        $user->password = Hash::make('password');
        $user->email = 'admin@sc.com';

        $user->status = 1;
        $user->save();
    }
}
