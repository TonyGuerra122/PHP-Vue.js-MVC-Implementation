<?php

namespace Source\Interfaces;

use DI\Container;
use Slim\App;

interface IRouter
{
    public function __construct(Container $container);
    public function start(App $app): void;
}
