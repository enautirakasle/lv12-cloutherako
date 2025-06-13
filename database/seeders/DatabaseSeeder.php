<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     //User::factory(10)->create();
        // Usuario::factory()->count(10)->create();

        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('password'), // Use bcrypt for password hashing
        // ]);
        $user = User::create([
    'name' => 'admin',
    'email' => 'admin@example.com',
    'password' => bcrypt('password'),
    'email_verified_at' => now(),
]);

$role = Role::firstOrCreate(['name' => 'admin']);
$user->assignRole('admin');
    }
}
