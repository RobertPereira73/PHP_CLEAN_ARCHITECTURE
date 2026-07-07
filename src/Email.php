<?php

namespace CleanArchitecture;

use Stringable;

/**
 * Value Object
 * Value Objects representam entidades que nao precisam de uma diferenciacao explicita por chave.
 * Uma forma de diferenciar Value Objects e quanto o atributo tem uma regra de negocio propria para o valor. 
 * Exemplo:
 * Um Email deve conter um @ e dominio para ser valido.
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