<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CreationRequest;
use App\Http\Requests\Company\UpdatingRequest;
use App\Models\Company;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

final class CompanyController extends AbstractController
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
        $this->authorize('viewAny', Company::class);

        $companies = Company::latest()->get();

        return Inertia::render('Company/List', [
            'companies' => $companies->toArray(),
            'quantity' => $companies->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function create(): Response
    {
        $this->authorize('create', Company::class);

        return Inertia::render('Company/Creating', [
            'quantity' => Company::count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function store(CreationRequest $request, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('create', Company::class);

        $company = Company::create(
            $request->get('name'),
            $request->get('website'),
            $request->get('address'),
            $request->get('phone_number')
        );

        return $company->save()
            ? new RedirectResponse($urlGenerator->route('companies.show', ['company' => $company->getKey()]))
            : throw new Exception();
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Company $company): Response
    {
        $this->authorize('update', $company);

        return Inertia::render('Company/Edit', [
            'company' => $company->toArray(),
            'quantity' => Company::count()
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function update(UpdatingRequest $request, Company $company, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('update', $company);

        $company->name = $request->get('name', $company->name);
        $company->website = $request->get('website', $company->website);
        $company->address = $request->get('address', $company->address);
        $company->phone_number = $request->get('phone_number', $company->phone_number);

        $company->save();

        return new RedirectResponse($urlGenerator->route(
            'companies.show',
            ['company' => $company->getKey()]
        ));
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Company $company): Response
    {
        $this->authorize('view', $company);

        $vacancies = $company->vacancies()->latest()->get();

        return Inertia::render('Company/Show', [
            'company' => $company->toArray(),
            'vacancy_quantity' => $vacancies->count(),
            'vacancies' => $vacancies->toArray()
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Company $company, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('delete', $company);

        $company->delete();

        return new RedirectResponse($urlGenerator->route('companies.list'));
    }
}
