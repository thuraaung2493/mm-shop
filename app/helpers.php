<?php

if (!function_exists('getActiveRouteClass')) {
    function getActiveRouteClass(string $name, array $parameters = []): string
    {
        return route($name, $parameters) === url()->full() ? 'active' : '';
    }
}

if (!function_exists('isActiveRoute')) {
    function isActiveRouteClass(string $name, array $parameters = []): string
    {
        return route($name, $parameters) === url()->full();
    }
}

if (!function_exists('inRoutes')) {
    function inRoutes(array $names = []): bool
    {
        return collect($names)->map(fn ($name) => route($name))->contains(url()->full());
    }
}

// {{ isActiveRouteClass('tables.show', ['table' => $table->no]) }}
