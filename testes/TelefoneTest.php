<?php

namespace CleanArchitecture\Testes;

use CleanArchitecture\Aluno\Telefone;
use PHPUnit\Framework\TestCase;

class TelefoneTest extends TestCase
{
    public function test_telefone_com_DDD_invalido_nao_pode_existir(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Telefone('1', '981715420');
    }

    public function test_telefone_com_numero_diferente_de_9_nao_pode_existir(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Telefone('12', '9817154202');
    }

    public function test_telefone_com_numero_diferente_de_8_nao_pode_existir(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Telefone('12', '9817154');
    }

    public function test_email_deve_poder_ser_representado_como_string(): void
    {
        $telefone = new Telefone('12', '981715420');
        $this->assertSame('12 981715420', (string) $telefone);
    }
}