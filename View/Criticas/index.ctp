<?php
$detalhe = array();
foreach ($criticas as $critica) {
    //$editLink = $this->Html->link('Alterar', '/filmes/edit/' . $filme['Filme']['id']);
    //$deleteLink = $this->Html->link('Excluir', '/filmes/delete/' . $filme['Filme']['id']);
    //$viewLink = $this->Html->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id']);
    $detalhe[] = array(
        //$viewLink, 
        $critica['Critica']['nome'],
        $critica['Filme']['nome'],
        $critica['Critica']['avaliacao'],
        $critica['Critica']['data_avaliacao'],
        //$editLink . ' ' . $deleteLink
    );
}


$titulos = array('Nome', 'Filme', 'Avaliação', 'Data',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/criticas/add');
$filmesButton = $this->Html->link('Filmes', '/filmes');

echo $this->Html->tag('h1', 'Filmes');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $filmesButton;
?>
