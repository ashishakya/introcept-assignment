<?php

use Illuminate\Routing\Route;

/**
 * @return array
 */
function getAllRoutes(): array
{
    return collect(app()->routes->getRoutesByName())->flatMap(
        function (Route $route) {
            return [$route->getName() => url($route->uri)];
        }
    )->toArray();
}
