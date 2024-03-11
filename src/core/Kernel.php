<?php

namespace Source\Core;

use DI\Container;
use Slim\App;
use Slim\Exception\HttpNotFoundException;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Source\Errors\KernelException;
use Source\Web\Handlers\NotFoundHandler;

/**
 * Classe que inicializa as configurações do sistema
 * @author Tony Guerra
 */
final class Kernel
{
    /**
     * Atributo estático que representa o App do Slim
     * @var App
     */
    private static App $app;
    /**
     * Atributo estático que representa o Container do DI
     * @var Container
     */
    private static Container $container;
    /**
     * Rotas pré-configuradas para serem carregadas
     * @var array 
     */
    private static array $routers = [
        \Source\Routers\ViewRouter::class
    ];
    /**
     * Método que carrega as configurações do container
     * @return void     
     */
    private static function loadContainer(): void
    {
        self::$container = new Container;
        AppFactory::setContainer(self::$container);
        self::$app = AppFactory::create();
    }
    /**
     * Método que configura o Twig Template Engine
     * @return void
     */
    private static function loadTwigTemplateConfig(): void
    {
        self::$container->set('view', fn () => Twig::create(VIEWS_PATH, ['cache' => false]));
    }
    /**
     * Método que configura as rotas do sistema
     * @throws KernelException
     * @return void
     */
    private static function loadRouters(): void
    {
        foreach (self::$routers as $route) {
            $routeInstance = new $route(self::$container);
            if (!is_subclass_of($routeInstance, '\\Source\\Interfaces\\IRouter')) throw new KernelException("A rota $route não implementa a interface IRouter");
            GlobalRouter::run(self::$app, $routeInstance);
        }
    }
    /**
     * Método que carrega as exceções dos Middlewares
     * @return void
     */
    private static function loadMiddlewaresException(): void
    {
        $errorMiddleware = self::$app->addErrorMiddleware(true, true, true);
        $errorMiddleware->setErrorHandler(
            HttpNotFoundException::class,
            NotFoundHandler::class
        );
    }
    /**
     * Classe que inicia o sistema
     * @return void
     */
    public static function bootload(): void
    {
        try {
            self::loadContainer();
            self::loadTwigTemplateConfig();
            self::loadMiddlewaresException();
            self::loadRouters();
            self::$app->run();
        } catch (KernelException $e) {
            die($e->getMessage());
        }
    }
}
