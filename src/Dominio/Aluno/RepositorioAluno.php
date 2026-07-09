<?php

namespace CleanArchitecture\Dominio\Aluno;

use CleanArchitecture\Dominio\CPF;

/**
 * Repositorios
 * 
 * Sao interfaces que vao ditar a forma como as entidades do meu DOMINIO vao ser persistidas e recuperadas, mais 
 * uma vez, sem se preocupar em "COMO" essas tarefas vao ser executadas, mas definindo assinaturas globais visando
 * seguir o fluxo da regra de negocio, abstraindo os detalhes de persistencia.
 */
interface RepositorioAluno
{
    public function adicionar(Aluno $aluno): void;

    public function buscarPorCPF(CPF $cpf): Aluno;

    /**
     * @return Aluno[]
     */
    public function buscarTodos(): array;
}