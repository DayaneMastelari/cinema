<?php
$detalhe = array();
foreach ($ators as $ator){
    $detalhe[] = array(
        $ator['Ator']['nome'],
        $ator['Ator']['nascimento']
    );
}

$titulos = array('Nome', 'Data Nascimento');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/ators/add');

echo $this->Html->tag('h1', 'Atores');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
?>