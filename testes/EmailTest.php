<?php

namespace CleanArchitecture\Testes;

use CleanArchitecture\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function test_email_invalido_nao_deve_poder_existir(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('robertpereira@');
    }

    public function test_email_deve_poder_ser_representado_como_string(): void
    {
        $email = new Email('robertpereira@gmail.com');
        $this->assertSame('robertpereira@gmail.com', (string) $email);
    }
}