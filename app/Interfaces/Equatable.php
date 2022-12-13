<?php

declare(strict_types=1);

namespace App\Interfaces;

/**
 * Interface Equatable
 *
 * Provides an equality check when there is only one way of comparing the objects
 */
interface Equatable
{
    /**
     * The method returns true if two objects are equal
     */
    public function equals(object $value): bool;
}
