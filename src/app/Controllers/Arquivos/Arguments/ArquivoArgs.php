<?php

namespace app\Controllers\Arquivos\Arguments;

final class ArquivoArgs {

    public $nome;
    public $tipo;
    public $extencao;
    public $localizacao;
    public $tamanho;

    public function __construct($_nome, $_tipo, $_extencao, $_localizacao, $_tamanho = null) {
        $this->nome = $_nome;
        $this->tipo = $_tipo;
        $this->extencao = $_extencao;
        $this->localizacao = $_localizacao;
        $this->tamanho = $_tamanho;
    }

}
