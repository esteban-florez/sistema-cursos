<?php

namespace App\Providers;

use App\Gates\PDFGates;
use App\Models\User;
use App\Policies\PDFPolicy;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        ResetPassword::createUrlUsing(function (User $user, $token) {
            return url("/reset-password/{$token}/{$user->email}");
        }); 

        Password::defaults(function () {
            return Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols();
        });

        Gate::define('role', function (User $user, ...$roles) {
            return collect($roles)->contains($user->role);
        });

        Gate::define('enrollments.approval.update', function (User $user, $enrollment) {
            if ($user->can('role', 'Administrador')) return true;

            return $user->can('role', 'Instructor')
                && $enrollment->course->instructor->id === $user->id;
        });

        Gate::define('enrollments.confirmation.update', function (User $user, $enrollment) {
            return $user->can('role', 'Administrador')
                && $enrollment->confirmed_at === null;
        });

        Gate::define('enrollments.success', function (User $user, $enrollment) {
            return $user->can('role', 'Estudiante')
                && $enrollment->student->id === $user->id;
        });
        
        PDFGates::define();
    }
}
