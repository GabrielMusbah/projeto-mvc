<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

class RealizarLogin implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if(is_null($email) || $email === false){
            echo 'E-mail invalido'
        }
        
    }
}