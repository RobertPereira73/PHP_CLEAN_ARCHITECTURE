<?php

namespace CleanArchitecture\Testes;

use CleanArchitecture\CPF;
use PHPUnit\Framework\TestCase;

class CPFTest extends TestCase
{
    public function test_cpf_com_numero_invalido_nao_deve_poder_existir(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new CPF('4997439681');
    }

    public function test_cpf_deve_poder_ser_representado_como_string(): void
    {
        $cpf = new CPF('49974396816');
        $this->assertSame('49974396816', (string) $cpf);
    }
}