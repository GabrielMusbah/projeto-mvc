<?php

namespace Alura\Cursos\Controller;

class CursosEmJson implements InterfaceControladorRequisicao
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new \Alura\Cursos\Infra\EntityManagerCreator())
            ->getEntityManager();

        $this->repositorioDeCursos = $entityManager
            ->getRepository(\Alura\Cursos\Entity\Curso::class);
    }

    public function processaRequisicao(): void
    {
        $cursos = $this->repositorioDeCursos->findAll();
        echo json_encode($cursos);
    }

}