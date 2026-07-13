<?php

require 'vendor/autoload.php';

use CleanArchitecture\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use CleanArchitecture\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDTO;
use CleanArchitecture\Infra\Aluno\RepositorioAlunoEmMemoria;

$matricularAlunoDTO = new MatricularAlunoDTO('49974396816', 'robert@gmail.com', 'ROBERT');

$alunoRepositorio = new RepositorioAlunoEmMemoria();

$matricularAlunoUseCase = new MatricularAluno($alunoRepositorio);
$matricularAlunoUseCase->executa($matricularAlunoDTO);

$todosAlunos = $alunoRepositorio->buscarTodos();

var_dump($todosAlunos);