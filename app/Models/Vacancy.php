<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $company_id
 * @property Company $company
 * @property Collection<Resume> $resumes
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 */
final class Vacancy extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Naming constructor
     */
    public static function create(string $title, string $text, int $companyId): Vacancy
    {
        return new self(array_merge(compact('title', 'text'), [
            'company_id' => $companyId
        ]));
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
