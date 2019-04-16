<?php
$detalhe = array();
foreach ($criticas as $critica) {
    $editLink = $this->Html->link('Alterar', '/criticas/edit/' . $critica['Critica']['id']);
    $deleteLink = $this->Html->link('Excluir', '/criticas/delete/' . $critica['Critica']['id']);
    $viewLink = $this->Html->link($critica['Filme']['nome'], '/criticas/view/' . $critica['Critica']['id']);
    $detalhe[] = array(
        $critica['Critica']['nome'],
        $viewLink,
        $critica['Critica']['avaliacao'],
        date('d/m/y', strtotime($critica['Critica']['data_avaliacao'])),
        $editLink . ' ' . $deleteLink
    );
}


$titulos = array('Nome', 'Filme', 'Avaliação', 'Data',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/criticas/add');
$filmesButton = $this->Html->link('Filmes', '/filmes');

echo $this->Html->tag('h1', 'Criticas');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $filmesButton;
?>
