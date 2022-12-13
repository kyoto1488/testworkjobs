<?php

declare(strict_types=1);

namespace App\Models\ValueObjects;

use App\Interfaces\ValueObject;
use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Arr;
use InvalidArgumentException;
use Stringable;

final class Email implements ValueObject, Stringable, Castable
{
    private function __construct(private string $email)
    {}

    public static function createFromString(string $email): Email
    {
        return new self($email);
    }

    public function __toString(): string
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public static function castUsing(array $arguments)
    {
        $column = Arr::first($arguments, default: 'path');

        return new class($column) implements CastsAttributes {
            public function __construct(private string $column)
            {
            }

            public function get($model, string $key, $value, array $attributes)
            {
                return isset($attributes[$this->column])
                    ? Email::createFromString($attributes[$this->column])
                    : null;
            }

            public function set($model, string $key, $value, array $attributes)
            {
                if ($value instanceof Email || is_null($value)) {
                    return [$this->column => $value ? (string)$value : null];
                }

                throw new InvalidArgumentException(
                    'The value type must be ' . Email::class
                );
            }
        };
    }

    /**
     * @inheritDoc
     */
    public function equals(object $value): bool
    {
        return $value instanceof self && (string) $this === (string) $value;
    }
}
