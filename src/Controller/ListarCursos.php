<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManegerCreator;
use Alura\Cursos\Entity\Curso;

class ListarCursos extends ControllerComHtml implements InterfaceControladorRequisicao
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
        $curso = $this->repositorioDeCursos->findAll();
        echo $this->renderizaHtml('cursos/listar-cursos.php', [
            'cursos' => $curso,
            'titulo' => 'Lista de Cursos'
        ]);
    }

}