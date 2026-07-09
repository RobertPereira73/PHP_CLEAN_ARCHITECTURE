<?php

namespace CleanArchitecture\Dominio\Aluno;

/**
 * Servicos de dominio
 * 
 * Sao classes que realizam alguma acao que faz parte da regra de negocio, do DOMINIO, porem
 * nao sao cabiveis a nenhuma ENTIDADE, Value Object ou Repositorio.
 * Um servico dominio nao trata de detalhes externos ao dominio. Ele simplesmente preve uma acao, ou conjunto de acoes, que faz
 * parte da regra de negocio central. Faz parte de como o DOMINIO deve se comportar. 
 * Um Servico de dominio se preocupa com "O QUE" precisa ser feito, deixando a responsabilidade de implementacao 
 * para os SERVICOS DE INFRA. 
 */
interface CifradorDeSenha
{
    public function cifrar(string $senhaEmTexto): string;

    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool;
}