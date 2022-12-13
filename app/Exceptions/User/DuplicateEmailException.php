<?php

declare(strict_types=1);

namespace App\Exceptions\User;

use Throwable;

final class DuplicateEmailException extends \Exception
{
    public function __construct(private string $email, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Duplicate email[$email]", $code, $previous);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
