<?php

require 'vendor/autoload.php';

use CleanArchitecture\{Aluno, CPF, Email};

$cpf = new CPF('49974396816');
$email = new Email('robertpereira611@gmail.com');
$aluno = new Aluno($cpf, $email, 'Robert');

var_dump($aluno);