<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $job
 * @property string|null $text
 * @property string|null $file
 * @property int $user_id
 * @property User $user
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 */
final class Resume extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $attributes = [
        'text' => null,
        'file' => null
    ];

    public static function create(int $userId, string $job, ?string $text = null, ?string $file = null): Resume
    {
        return new self(array_merge(compact('job', 'text', 'file'), [
            'user_id' => $userId
        ]));
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
