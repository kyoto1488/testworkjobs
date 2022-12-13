<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 * @property string $website
 * @property string $address
 * @property string $phone_number
 * @property Collection<Vacancy> $vacancies
 * @property DateTime|null $created_at
 * @property DateTime|null $updated_at
 */
final class Company extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Naming constructor
     */
    public static function create(string $name, string $website, string $address, string $phoneNumber): Company
    {
        return new self(array_merge(compact('name', 'website', 'address'), [
            'phone_number' => $phoneNumber
        ]));
    }

    public function vacancies(): HasMany
    {
        return $this->hasMany(Vacancy::class);
    }
}
