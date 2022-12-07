<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Infra\EntityManagerCreator;
use Alura\Cursos\Entity\Curso;

abstract class ControllerComHtml
{
    public function renderizaHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);

        ob_start(); //salva a pagina hmtl

        require __DIR__ . '/../../view/' . $caminhoTemplate;

        $html = ob_get_clean(); //salva o html em uma variavel e limpa o ob

        return $html; //devolve o hmtl como string
    }
}