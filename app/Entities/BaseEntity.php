<?php

namespace App\Entities;

abstract class BaseEntity
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
