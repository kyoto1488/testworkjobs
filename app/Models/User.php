<?php

namespace App\Models;

use App\Exceptions\User\DuplicateEmailException;
use App\Models\Enums\Role;
use App\Models\ValueObjects\Email;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string $name
 * @property Email $email
 * @property string $password
 * @property Role $role
 * @property Collection<Resume> $resumes
 * @property Collection<Feedback> $feedbacks
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 */
final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];
    protected $casts = [
        'email' => Email::class . ':email',
        'role' => Role::class
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        $assertUniqueEmail = function (User $user) {
            $qb = User::query()
                ->where('email', (string) $user->email);

            if ($user->exists) {
                $qb->whereKeyNot($user->getKey());
            }

            if ($qb->exists()) {
                throw new DuplicateEmailException($user->email);
            }
        };
        static::creating($assertUniqueEmail);
        static::updating($assertUniqueEmail);
    }

    /**
     * Naming constructor
     */
    public static function create(
        Email $email,
        string $password,
        string $name,
        Role $role = Role::USER
    ): User {
        return new self(array_merge(compact('name', 'role', 'email'), [
            'password' => Hash::make($password)
        ]));
    }

    public function resumes(): HasMany
    {
        return $this->hasMany(Resume::class);
    }

    public function feedbacks(): HasManyThrough
    {
        return $this->hasManyThrough(Feedback::class, Resume::class);
    }
}
