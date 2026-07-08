<?php

namespace CleanArchitecture\Infra\Aluno;

use CleanArchitecture\Dominio\Aluno\{Aluno, AlunoNaoEncontradoException, Telefone};
use CleanArchitecture\Dominio\Aluno\RepositorioAluno;
use CleanArchitecture\Dominio\CPF;

class RepositorioAlunoPDO implements RepositorioAluno
{
    private function __construct(
        private \PDO $conexao
    )
    {}

    public function adicionar(Aluno $aluno): void
    {
        $sql = 'INSERT INTO alunos VALUES(:cpf, :nome, :email);';
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf', $aluno->getCPF());
        $stmt->bindValue('nome', $aluno->getNome());
        $stmt->bindValue('email', $aluno->getEmail());
        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES(:ddd, :numero, :cpf_aluno);';
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf_aluno', $aluno->getCPF());

        /** @var Telefone $telefone */
        foreach ($aluno->getTelefones() as $telefone) {
            $stmt->bindValue('ddd', $telefone->getDDD());
            $stmt->bindValue('numero', $telefone->getNumero());
            $stmt->execute();
        }
    }

    public function buscarPorCPF(CPF $cpf): Aluno
    {
        $sql = "
            SELECT cpf, email, nome, ddd, numero as numero_telefone
            
            FROM alunos
                LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf
            
            WHERE alunos.cpf = ?
        ";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $cpf);
        $stmt->execute();

        $dadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($dadosAluno) === 0) {
            throw new AlunoNaoEncontradoException($cpf);
        }

        return $this->mapearAluno($dadosAluno);
    }

    private function mapearAluno(array $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        
        $cpf = $primeiraLinha['cpf'];
        $nome = $primeiraLinha['nome'];
        $email = $primeiraLinha['email'];
        
        $aluno = Aluno::comCPFEmailENome($cpf, $email, $nome);
        
        $telefones = array_filter(
            $dadosAluno, 
            fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null
        );

        if (!count($telefones)) {
            return $aluno;
        }

        foreach($telefones as $telefone) {
            $ddd = $telefone['ddd'];
            $numero_telefone = $telefone['numero_telefone'];

            $aluno->addTelefone($ddd, $numero_telefone);
        }

        return $aluno;
    }

    public function buscarTodos(): array
    {
        $sql = "
            SELECT cpf, email, nome, ddd, numero as numero_telefone
            
            FROM alunos
                LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf
        ";
        
        $stmt = $this->conexao->prepare($sql);

        $stmt->execute();

        $listaDadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $alunos = [];

        foreach ($listaDadosAluno as $dadosAluno) {
            $cpf = $dadosAluno['cpf'];

            if (!array_key_exists($cpf, $alunos)) {
                $nome = $dadosAluno['nome'];
                $email = $dadosAluno['email'];
                
                $alunos[$cpf] = Aluno::comCPFEmailENome($cpf, $email, $nome);
            }

            $ddd = $dadosAluno['ddd'];
            $numero_telefone = $dadosAluno['numero_telefone'];

            $alunos[$cpf]->addTelefone($ddd, $numero_telefone);
        }

        return array_values($alunos);
    }
}