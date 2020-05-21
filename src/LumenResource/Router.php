<?php


namespace Owuan\LumenResource;

use Illuminate\Support\Str;
use Laravel\Lumen\Routing\Router as BaseRouter;

/**
 * Class Router
 * @package Owuan\LumenResource
 */
class Router extends BaseRouter
{

    /**
     * @param string $route
     * @param string $controller
     * @param array $options
     * @return $this
     */
    public function resource(string $route, string $controller, array $options = [])
    {
        $registrar = new ResourceRegistrar($this);

        $registrar->register($route, $controller, $options);

        return $this;
    }

    /**
     * @param string $route
     * @param string $controller
     * @param array $options
     * @return $this
     */
    public function apiResource(string $route, string $controller, array $options = [])
    {
        $this->resource($route, $controller, $options);
    }

    /**
     * @param array $types
     * @param string $uri
     * @param $action
     * @return $this
     */
    public function match(array $types, string $uri, $action)
    {
        foreach ($types as $type) {
            $this->{$type}($uri, $action);
        }

        return $this;
    }
}

