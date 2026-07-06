<?php

namespace CleanArchitecture;

use Stringable;

/**
 * Value Object
 * Value Objects representam entidades que nao precisam de uma diferenciacao explicita por chave.
 * 
 * Exemplo:
 * Emails iguais representam a mesma instancia. Ou seja, dois emails identicos representam o mesmo email
 */
class Email implements Stringable
{
    private string $endereco;

    public function __construct(
        string $endereco
    )
    {
        $this->setEndereco($endereco);
    }

    public function setEndereco(string $endereco): void
    {
        if (filter_var($endereco, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException("Endereco de email invalido!");
        }

        $this->endereco = $endereco;
    }

    public function __toString(): string
    {
        return $this->endereco;
    }
}