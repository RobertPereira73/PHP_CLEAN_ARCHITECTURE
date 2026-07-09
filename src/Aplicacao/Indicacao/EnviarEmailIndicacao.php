<?php

namespace CleanArchitecture\Aplicacao\Indicacao;

use CleanArchitecture\Dominio\Aluno\Aluno;

/**
 * Servicos de aplicacao
 * 
 * Sao tarefas que precisam executadas, mas nao por uma necessidade de regra de negocio e sim da aplicacao, do sistema que estamos construindo.
 * Ou seja, nao faz parte do DOMINIO central, do negocio, e sim apenas um detalhe da plataforma.
 * Nao representa um regra de fluxo do negocio.
 */
interface EnviarEmailIndicacao
{
    public function enviaPara(Aluno $indicado): void;
}