<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Usuario;

class RealizarLogin implements InterfaceControladorRequisicao
{
    private $repositorioUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(
        INPUT_POST,
        'email',
        FILTER_VALIDATE_EMAIL
        );

        if (is_null($email) || $email === false) {
            echo "O e-mail digitado não é um e-mail válido";
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            'senha',
            FILTER_SANITIZE_STRING
        );

        $usuario = $this->repositorioUsuarios
            ->FindOneBy(['email' => $email]);

        if (is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            echo 'E-mail ou senha invalidas';
            return;
        }

        
        $_SESSION['logado'] = true;

        header('Location: /listar-cursos');
        
    }
}

