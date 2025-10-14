<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$K7KROoy65onGC8Sawsqk4.FvNp2MjGbJbrZMOZeLmsXcsGYwDiaj6', // password
                'remember_token' => null,
                'created_at' => '2024-04-26 07:01:23',
                'updated_at' => '2024-04-26 07:01:23',
            ],
            [
                'id' => 2,
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$bQmHKYZjGNMZ0wGKvX8oP.DVOAseJMxNk41E0LAMRMN.1r26mfFwa', // password
                'remember_token' => null,
                'created_at' => '2024-04-26 07:22:39',
                'updated_at' => '2024-04-26 07:22:39',
            ],
            [
                'id' => 3,
                'name' => 'test',
                'email' => 'test@mail.ru',
                'email_verified_at' => null,
                'password' => '$2y$12$VRXbymR560k3rdO94.i4LuA8zrcBeRcYJndD3zVNRy7YDC2v05rA.', // password
                'remember_token' => null,
                'created_at' => '2024-05-01 01:27:33',
                'updated_at' => '2024-05-01 01:27:33',
            ],
            [
                'id' => 4,
                'name' => 'qwe',
                'email' => 'yokenotenshi@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$xTBxTOqJlWnwy2eEF3c1KeeKjM9NM9ySvWwZXs51VXdjOAzp6hMnG', // password
                'remember_token' => null,
                'created_at' => '2024-10-07 07:29:35',
                'updated_at' => '2024-10-07 07:29:35',
            ],
            [
                'id' => 5,
                'name' => 'test test',
                'email' => 'erustamow2@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$0epx3ZpwNIi4JUZwkcWf0elAjK8iLiS8GHlQswrvBZay0vNqRgy4y', // password
                'remember_token' => null,
                'created_at' => '2024-10-29 04:41:27',
                'updated_at' => '2024-10-29 04:41:27',
            ],
            [
                'id' => 6,
                'name' => 'test',
                'email' => 'testsobaka@mail.ru',
                'email_verified_at' => null,
                'password' => '$2y$12$gyFdNjlSl2AnGxn3rq5tZ.5qONKvSKsOVcWa5hBHtFv/dO7b93Xne', // password
                'remember_token' => null,
                'created_at' => '2024-11-05 04:07:53',
                'updated_at' => '2024-11-05 04:07:53',
            ],
            [
                'id' => 7,
                'name' => 'adminxp',
                'email' => 'adminxp@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$o/tBxm3.4WaN0lLe8t/YBOpDxT8.9uK8LXL5f3wl9ammHJ6BtpNnG', // password
                'remember_token' => null,
                'created_at' => '2025-09-09 09:18:28',
                'updated_at' => '2025-09-09 09:18:28',
            ],
            [
                'id' => 8,
                'name' => 'Admin',
                'email' => 'admin@ltm.com',
                'email_verified_at' => '2025-10-14 05:26:16',
                'password' => '$2y$12$/WTdI2UjyRuuwls0Xlwrb.3dzK5VnLq.wD8Jcd3EV9CwWCgeqho6C', // password
                'remember_token' => null,
                'created_at' => '2025-10-14 05:26:16',
                'updated_at' => '2025-10-14 05:26:16',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['id' => $user['id']],
                $user
            );
        }

        // Создадим дополнительного тестового пользователя с простым паролем
        User::updateOrCreate(
            ['email' => 'test@test.com'],
            [
                'name' => 'Test User',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
            ]
        );
    }
}
