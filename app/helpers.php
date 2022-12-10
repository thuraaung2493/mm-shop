<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

if (!function_exists('toString')) {
    function toString(Collection $collect, ?String $key = null, $delimiter = ', '): string
    {
        if ($key) {
            return $collect->implode($key, $delimiter);
        }
        return $collect->implode($delimiter);
    }
}

if (!function_exists('str')) {
    function str(String $str): Stringable
    {
        return Str::of($str);
    }
}

if (!function_exists('inRoutes')) {
    function inRoutes(array $names = []): bool
    {
        $url = explode('?', url()->full())[0];

        return collect($names)->map(fn ($name) => route($name))->contains($url);
    }
}
