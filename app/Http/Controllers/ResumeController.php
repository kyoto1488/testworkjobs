<?php

namespace App\Http\Controllers;

use App\Http\Requests\Resume\CreationRequest;
use App\Http\Requests\Resume\UpdatingRequest;
use App\Models\Resume;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

final class ResumeController extends AbstractController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @throws AuthorizationException
     */
    public function index(Factory $auth): Response
    {
        $this->authorize('viewAny', Resume::class);

        /** @var User $user */
        $user = $auth->guard()->user();
        $resumes = $user->resumes()->latest()->get();

        return Inertia::render('Resume/List', [
            'resumes' => $resumes->toArray(),
            'quantity' => $resumes->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function show(Resume $resume): Response
    {
        $this->authorize('view', $resume);

        return Inertia::render('Resume/Show', [
            'resume' => $resume->toArray()
        ]);
    }

    /**
     * @throws AuthorizationException
     */
    public function create(Factory $auth): Response
    {
        $this->authorize('create', Resume::class);

        /** @var User $user */
        $user = $auth->guard()->user();

        return Inertia::render('Resume/Creating', [
            'quantity' => $user->resumes()->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function store(CreationRequest $request, UrlGenerator $urlGenerator, Factory $auth): RedirectResponse
    {
        $this->authorize('create', Resume::class);

        /** @var User $user */
        $user = $auth->guard()->user();

        $resume = Resume::create(
            $user->getKey(),
            $request->get('job'),
            $request->get('text')
        );

        if ($request->hasFile('file')) {
            $resume->file = $this->uploadFile($request->file('file'));
        }

        $resume->save();

        return new RedirectResponse(
            $urlGenerator->route('resumes.show', ['resume' => $resume->getKey()])
        );
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Resume $resume, Factory $auth): Response
    {
        $this->authorize('update', $resume);

        /** @var User $user */
        $user = $auth->guard()->user();

        return Inertia::render('Resume/Edit', [
            'resume' => $resume->toArray(),
            'quantity' => $user->resumes()->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function update(UpdatingRequest $request, Resume $resume, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('update', $resume);

        $resume->job = $request->get('job', $resume->job);
        $resume->text = $request->get('text', $resume->text);

        if ($request->hasFile('file')) {
            $resume->file = $this->uploadFile($request->file('file'));
        }

        return $resume->save()
            ? new RedirectResponse($urlGenerator->route('resumes.show', ['resume' => $resume->getKey()]))
            : throw new Exception;

    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Resume $resume, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('delete', $resume);

        $resume->delete();

        return new RedirectResponse($urlGenerator->route('resumes.list'));
    }

    /**
     * @return string the path
     * @throws Exception
     */
    private function uploadFile(UploadedFile $file): string
    {
        if (! ($path = $file->storePublicly(''))) {
            throw new Exception('Error upload file');
        }

        return Storage::url($path);
    }
}
