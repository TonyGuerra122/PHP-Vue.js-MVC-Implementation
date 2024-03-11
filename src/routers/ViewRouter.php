<?php

namespace Source\Routers;

use DI\Container;
use Slim\App;
use Source\Interfaces\IRouter;

final class ViewRouter implements IRouter
{

    public function __construct(private Container $container)
    {
    }

    public function start(App $app): void
    {
        $container = $this->container;

        $app->get('{routes:.+}', function ($request, $response, $args) use ($container) {
            $view = $container->get('view');
            return $view->render($response, 'home.twig', [
                'base_url' => ROOT_PATH
            ]);
        });
    }
}
