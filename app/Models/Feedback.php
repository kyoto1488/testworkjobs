<?php

namespace App\Models;

use App\Models\Enums\Feedback\Status;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $vacancy_id
 * @property Vacancy $vacancy
 * @property string|null $comment
 * @property int $resume_id
 * @property Resume $resume
 * @property Status $status
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 */
final class Feedback extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'status' => Status::class
    ];
    protected $attributes = [
        'status' => Status::PENDING,
        'comment' => null
    ];

    /**
     * Naming constructor
     */
    public static function create(Vacancy $vacancy, Resume $resume, ?string $comment = null): Feedback
    {
        return new self([
            'vacancy_id' => $vacancy->getKey(),
            'resume_id' => $resume->getKey(),
            'comment' => $comment
        ]);
    }

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }

    public function vacancy(): BelongsTo
    {
        return $this->belongsTo(Vacancy::class);
    }

    public function scopeByVacancy(Builder $query, Vacancy $vacancy): Builder
    {
        return $query->where('vacancy_id', $vacancy->getKey());
    }
}
