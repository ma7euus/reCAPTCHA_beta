<?php

namespace app\Controllers\Arquivos\Arguments;

final class ArquivoArgs {

    public $nome;
    public $tipo;
    public $extencao;
    public $localizacao;
    public $tamanho;
    public $tmpId;

    public function __construct($_nome, $_tipo, $_extencao, $_localizacao, $_tamanho = null, $_tmpId = null) {
        $this->nome = $_nome;
        $this->tipo = $_tipo;
        $this->extencao = $_extencao;
        $this->localizacao = $_localizacao;
        $this->tamanho = $_tamanho;
        $this->tmpId = $_tmpId;
    }

}
