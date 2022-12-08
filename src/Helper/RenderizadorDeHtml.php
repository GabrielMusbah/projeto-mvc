<?php

namespace Alura\Cursos\Helper;

trait RenderizadorDeHtml
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

