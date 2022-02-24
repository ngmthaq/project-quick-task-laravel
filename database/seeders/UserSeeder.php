<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks=0");
        User::truncate();
        DB::statement("SET foreign_key_checks=1");

        $admin = User::create([
            'first_name' => 'Nguyễn',
            'last_name' => 'Mạnh Thắng',
            'email' => 'admin@sun.com',
            'username' => 'admin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'is_admin' => User::IS_ADMIN,
            'is_active' => User::USER_ACTIVE,
        ]);

        User::factory()
            ->has(Task::factory()->count(1), 'tasks')
            ->count(10)
            ->create();
    }
}
