<?php

require 'vendor/autoload.php';

use CleanArchitecture\Dominio\Aluno\Aluno;
use CleanArchitecture\Dominio\Instrutor\Instrutor;

$aluno = Aluno::comCPFEmailENome('49974396816', 'robert@gmail.com', 'ROBERT');

var_dump($aluno);