<?php

namespace CleanArchitecture\Aplicacao\Aluno\MatricularAluno;

use CleanArchitecture\Dominio\CPF;
use CleanArchitecture\Infra\Aluno\RepositorioAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function teste_aluno_deve_ser_adicionado_ao_repositorio(): void
    {
        $matricularAlunoDTO = new MatricularAlunoDTO('49974396816', 'teste@example.com', 'TESTE');

        $repositorioDeAluno = new RepositorioAlunoEmMemoria();

        $useCase = new MatricularAluno($repositorioDeAluno);

        $useCase->executa($matricularAlunoDTO);

        $aluno = $repositorioDeAluno->buscarPorCPF(new CPF('49974396816'));

        $this->assertSame('teste@example.com', (string) $aluno->getEmail());
        $this->assertSame('49974396816', (string) $aluno->getCPF());
        $this->assertEmpty($aluno->getTelefones());
    }
}