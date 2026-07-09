<?php

namespace CleanArchitecture\Infra\Aluno;

use CleanArchitecture\Dominio\Aluno\CifradorDeSenha;

/**
 * Servicos de Infraestrutura
 * 
 * Sao servicos que vao implementar de forma concreta os servicos de DOMINIO e APLICACAO, dependendo de detalhes externos, como o
 * criptografar uma senha ou o envio de email.
 * Servicos de infraestrutura preocupa em "COMO" a acao precisa ser feita, por isso depende de detalhes externos a aplicacao e dominio.
 */
class CifradorDeSenhaMD5 implements CifradorDeSenha
{
    public function cifrar(string $senha): string
    {
        return md5($senha);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
    {
        return md5($senhaEmTexto) === $senhaCifrada;
    }
}