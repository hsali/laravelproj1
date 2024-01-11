<?php

namespace App\Providers;

use App\Models\Student; // Import the 'Student' class from the appropriate namespace
use App\Policies\StudentPolicy; // Import the 'StudentPolicy' class from the appropriate namespace
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    
    protected $policies = [
        Student::class => StudentPolicy::class,
    ];
    
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
