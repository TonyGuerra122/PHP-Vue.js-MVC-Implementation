<?php

namespace Source\Errors;

use RuntimeException;

/**
 * Classe de exceção personalizada para a classe Kernel
 * @author Tony Guerra
 */
final class KernelException extends RuntimeException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
