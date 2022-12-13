<?php

declare(strict_types=1);

namespace App\Models\Enums\Feedback;

enum Status: string
{
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case PENDING = 'pending';
}
