<?php

namespace Source\Core;

use Slim\App;
use Source\Interfaces\IRouter;

final class GlobalRouter
{
    public static function run(App $app, IRouter $router)
    {
        $router->start($app);
    }
}
