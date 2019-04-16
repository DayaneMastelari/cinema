<?php
$detalhe = array();
foreach ($ators as $ator){
    $deleteLink = $this->Html->link('Excluir', '/ators/delete/' . $ator['Ator']['id']);
    $detalhe[] = array(
        $ator['Ator']['nome'],
        $ator['Ator']['nascimento'],
        $deleteLink
    );
}

$titulos = array('Nome', 'Data Nascimento');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/ators/add');
$filmesButton = $this->Html->link('Filmes', '/filmes');

echo $this->Html->tag('h1', 'Atores');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $filmesButton;
?>