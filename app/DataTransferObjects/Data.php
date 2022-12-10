<?php

namespace App\DataTransferObjects;

abstract class Data
{
    abstract public function toArray(): array;

    public function has(String $key): bool
    {
        return isset($this->{$key});
    }
}
