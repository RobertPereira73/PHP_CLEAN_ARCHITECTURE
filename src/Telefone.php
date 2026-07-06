<?php

namespace CleanArchitecture;

use Stringable;

/**
 * Value Object
 * Value Objects representam entidades que nao precisam de uma diferenciacao explicita por chave.
 * 
 * Exemplo:
 * Telefones iguais representam a mesma instancia. Ou seja, dois Telefones identicos representam o mesmo Telefones
 */
class Telefone implements Stringable
{
    private string $ddd;

    private string $numero;

    public function __construct(
        string $ddd,
        string $numero
    )
    {
        $this->setDDD($ddd);
        $this->setNumero($numero);
    }

    public function setDDD(string $ddd): void
    {
        if (strlen($ddd) !== 2) {
            throw new \InvalidArgumentException("O DDD do telefone deve ter exatos 2 caracteres!");
        }

        $this->ddd = $ddd;
    }

    public function setNumero(string $numero): void
    {
        if (strlen($numero) !== 8 && strlen($numero) !== 9) {
            throw new \InvalidArgumentException("O numero de telefone deve ter exatos 8 ou 9 caracteres!");
        }

        $this->numero = $numero;
    }

    public function __toString(): string
    {
        return $this->ddd . ' ' . $this->numero;
    }
}