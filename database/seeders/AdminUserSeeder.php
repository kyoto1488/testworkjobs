<?php

namespace Database\Seeders;

use App\Models\Enums\Role;
use App\Models\User;
use App\Models\ValueObjects\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            Email::createFromString('admin@localhost.dev'),
            'admin',
            'Admin',
            Role::ADMIN
        );

        try {
            $user->save();
        } catch (\Throwable) {}
    }
}
