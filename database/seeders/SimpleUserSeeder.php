<?php

namespace Database\Seeders;

use App\Models\Enums\Role;
use App\Models\User;
use App\Models\ValueObjects\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SimpleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            Email::createFromString('user@localhost.dev'),
            'user',
            'User'
        );

        try {
            $user->save();
        } catch (\Throwable) {}
    }
}
