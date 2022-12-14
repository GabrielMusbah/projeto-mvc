<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;


class Deslogar implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {   
        session_destroy();
        header('Location: /login');
    }
}