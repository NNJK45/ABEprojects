<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Programme;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RuntimeException;

class RenderDeploymentSeeder extends Seeder
{
    public function run(): void
    {
        $credentials = [
            'name' => env('ADMIN_NAME', 'Administrateur ABE'),
            'email' => env('ADMIN_EMAIL'),
            'password' => env('ADMIN_PASSWORD'),
        ];

        $validator = Validator::make($credentials, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:12'],
        ]);

        if ($validator->fails()) {
            throw new RuntimeException(
                'ADMIN_EMAIL et ADMIN_PASSWORD (12 caractères minimum) doivent être configurés sur Render.'
            );
        }

        if (! Programme::query()->exists()) {
            $this->call(AbeDemoContentSeeder::class);
        }

        User::query()->updateOrCreate(
            ['email' => $credentials['email']],
            [
                'name' => $credentials['name'],
                'password' => Hash::make($credentials['password']),
                'role' => UserRole::Admin,
            ],
        );
    }
}
