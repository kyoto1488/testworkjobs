<?php

namespace App\Http\Controllers;

use App\Models\Enums\Role;
use App\Models\User;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

final class HomeController extends AbstractController
{
    public function __invoke(Factory $factory, UrlGenerator $urlGenerator): RedirectResponse
    {
        if ($factory->guard()->guest()) {
            return new RedirectResponse($urlGenerator->route('login'));
        }

        /** @var User $user */
        $user = $factory->guard()->user();

        if ($user->role === Role::ADMIN) {
            return new RedirectResponse($urlGenerator->route('companies.list'));
        }

        return new RedirectResponse($urlGenerator->route('resumes.list'));
    }
}
