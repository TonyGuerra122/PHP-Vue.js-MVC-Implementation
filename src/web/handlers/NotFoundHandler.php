<?php

namespace Source\Web\Handlers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Interfaces\ErrorHandlerInterface;
use Slim\Psr7\Response;
use Throwable;

/**
 * Classe de exceção que lança o status 404
 * @author Tony Guerra
 */
final class NotFoundHandler implements ErrorHandlerInterface
{
    public function __invoke(
        ServerRequestInterface $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails
    ): ResponseInterface {
        $response = new Response;
        $response->getBody()->write('404 NOT FOUND');

        return $response->withStatus(404);
    }
}
