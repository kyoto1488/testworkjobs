<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Feedback;
use App\Models\Resume;
use App\Models\Vacancy;
use App\Policies\CompanyPolicy;
use App\Policies\FeedbackPolicy;
use App\Policies\ResumePolicy;
use App\Policies\VacancyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Company::class => CompanyPolicy::class,
        Vacancy::class => VacancyPolicy::class,
        Resume::class => ResumePolicy::class,
        Feedback::class => FeedbackPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
