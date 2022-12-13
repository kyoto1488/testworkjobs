<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancy\CreationRequest;
use App\Http\Requests\Vacancy\UpdatingRequest;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Vacancy;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final class VacancyController extends AbstractController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @throws AuthorizationException
     */
    public function index(): Response
    {
        $this->authorize('viewAny', Vacancy::class);

        $vacancies = Vacancy::all();

        return Inertia::render('Vacancy/List', [
            'quantity' => $vacancies->count(),
            'vacancies' => $vacancies->toArray()
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Vacancy $vacancy, Factory $auth): Response
    {
        $this->authorize('view', $vacancy);

        /** @var User $user */
        $user = $auth->guard()->user();

        return Inertia::render('Vacancy/Show', [
            'vacancy' => $vacancy->toArray(),
            'company' => $vacancy->company->toArray(),
            'resumes' => $user->resumes->toArray(),
            'feedback' => $user->feedbacks()
                ->with('resume')
                ->byVacancy($vacancy)
                ->first()

        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('create', Vacancy::class);

        $companies = Company::all();

        return Inertia::render('Company/CreatingVacancy', [
            'companies' => $companies->toArray(),
            'quantity' => $companies->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function store(CreationRequest $request, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('create', Vacancy::class);

        /** @var Company $company */
        $company = Company::find($request->get('company_id'))
            ?? throw new BadRequestHttpException('Company not found');

        $vacancy = Vacancy::create(
            $request->get('title'),
            $request->get('text'),
            $company->getKey()
        );

        return $vacancy->save()
            ? new RedirectResponse($urlGenerator->route('vacancies.show', ['vacancy' => $vacancy->getKey()]))
            : throw new Exception('Error');
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Vacancy $vacancy): Response
    {
        $this->authorize('update', $vacancy);

        $companies = Company::all();

        return Inertia::render('Company/EditVacancy', [
            'vacancy' => $vacancy->toArray(),
            'companies' => $companies->toArray(),
            'quantity' => $companies->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function update(UpdatingRequest $request, Vacancy $vacancy, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('update', $vacancy);

        if ($request->has('company_id')) {
            /** @var Company $company */
            $company = Company::find($request->get('company_id'))
                ?? throw new BadRequestHttpException('Company not found');

            $vacancy->company_id = $company->getKey();
        }

        $vacancy->title = $request->get('title', $vacancy->title);
        $vacancy->text = $request->get('text', $vacancy->text);

        return $vacancy->save()
            ? new RedirectResponse($urlGenerator->route('vacancies.show', ['vacancy' => $vacancy->getKey()]))
            : throw new Exception;
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Vacancy $vacancy, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('delete', $vacancy);

        $company = $vacancy->company;

        $vacancy->delete();

        return new RedirectResponse($urlGenerator->route(
            'companies.show',
            ['company' => $company->getKey()]
        ));
    }
}
