<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManegerCreator;
use Alura\Cursos\Entity\Curso;

class ListarCursos implements InterfaceControladorRequisicao
{
    private $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new \Alura\Cursos\Infra\EntityManagerCreator())
            ->getEntityManager();

        $this->repositorioDeCursos = $entityManager
            ->getRepository(\Alura\Cursos\Entity\Curso::class);
    }

    public function processaRequisicao( ): void
    {
        $cursos = $this->repositorioDeCursos->findAll();
        $titulo = 'Lista de Cursos';
        require __DIR__ . '/../../view/cursos/listar-cursos.php';
    }

}