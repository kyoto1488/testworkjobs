<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Feedback;
use App\Models\Resume;
use App\Models\Vacancy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::factory()->count(10)->create();
        Vacancy::factory()->count(100)->create();
        Resume::factory()->count(200)->create();
        Feedback::factory()->count(50)->create();
    }
}
