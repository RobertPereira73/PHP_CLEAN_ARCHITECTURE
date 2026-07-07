<?php

namespace CleanArchitecture;

use Stringable;

/**
 * Value Object
 * Value Objects representam entidades que nao precisam de uma diferenciacao explicita por chave.
 * Uma forma de diferenciar Value Objects e quanto o atributo tem uma regra de negocio propria para o valor. 
 * Exemplo:
 * Um CPF deve conter 11 caracteres para ser valido, uma regra ligada ao valor.
 * 
 * Exemplo:
 * CPFs iguais representam a mesma instancia. Ou seja, dois CPFs identicos representam o mesmo CPF
 */
class CPF implements Stringable
{
    private string $cpf;

    public function __construct(
        string $cpf
    )
    {
        $this->setCPF($cpf);
    }

    public function setCPF(string $cpf): void
    {
        if (strlen($cpf) < 11) {
            throw new \InvalidArgumentException("CPF invalido!");
        }

        $this->cpf = $cpf;
    }

    public function __toString(): string
    {
        return $this->cpf;
    }
}