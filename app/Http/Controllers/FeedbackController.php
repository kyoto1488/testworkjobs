<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feedback\CreationRequest;
use App\Http\Requests\Feedback\UpdatingRequest;
use App\Models\Enums\Feedback\Status;
use App\Models\Enums\Role;
use App\Models\Feedback;
use App\Models\Resume;
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


final class FeedbackController extends AbstractController
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
        $this->authorize('viewAny', Feedback::class);

        /** @var User $user */
        $user = $auth->guard()->user();

        if ($user->role === Role::ADMIN) {
            $qb = Feedback::latest();
        } else {
            $qb = $user->feedbacks()->latest();
        }

        $feedbacks = $qb->with('resume', 'vacancy')->get();

        return Inertia::render('Feedback/List', [
            'feedbacks' => $feedbacks->toArray(),
            'quantity' => $feedbacks->count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function store(CreationRequest $request, Factory $auth, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('create', Feedback::class);

        /** @var User $user */
        $user = $auth->guard()->user();

        /** @var Vacancy $vacancy */
        $vacancy = Vacancy::find($request->get('vacancy_id'))
            ?? throw new BadRequestHttpException('Vacancy not found');

        /** @var Resume $resume */
        $resume = $user->resumes()->find($request->get('resume_id'))
            ?? throw new BadRequestHttpException('Resume not found');

        $feedback = Feedback::create($vacancy, $resume);

        return $feedback->save()
            ? new RedirectResponse($urlGenerator->route('vacancies.show', ['vacancy' => $vacancy->getKey()]))
            : throw new Exception;
    }

    /**
     * @throws AuthorizationException
     */
    public function edit(Feedback $feedback): Response
    {
        $this->authorize('update', $feedback);

        $feedback->load('resume', 'vacancy');

        return Inertia::render('Feedback/Edit', [
            'feedback' => $feedback,
            'quantity' => Feedback::count()
        ]);
    }

    /**
     * @throws AuthorizationException
     * @throws Exception
     */
    public function update(UpdatingRequest $request, Feedback $feedback, UrlGenerator $urlGenerator): RedirectResponse
    {
        $this->authorize('update', $feedback);

        $feedback->comment = $request->get('comment', $feedback->comment);
        $feedback->status = $request->has('status')
            ? Status::from($request->get('status'))
            : $feedback->status;

        return $feedback->save()
            ? new RedirectResponse($urlGenerator->route('feedbacks.list'))
            : throw new Exception;
    }
}
