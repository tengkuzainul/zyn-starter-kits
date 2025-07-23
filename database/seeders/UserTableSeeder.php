<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Administrator',
                'email' => 'superadmin@example.id',
                'password' => Hash::make('superadmin'),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.id',
                'password' => Hash::make('user'),
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'password' => $user['password'],
                ]
            );
        }

        // Assign default role to super admin
        // Assuming 'super-admin' is a valid role in your application
        $superAdmin = User::where('email', 'superadmin@example.id')->first();

        $user = User::where('email', 'user@example.id')->first();

        if ($superAdmin) {
            $superAdmin->assignRole('super-admin');
        }
        // Assign default role to user
        // Assuming 'user' is a valid role in your application
        if ($user) {
            $user->assignRole('user');
        }
    }
}
