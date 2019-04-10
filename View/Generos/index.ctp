<?php
$detalhe = array();
foreach ($generos as $genero) {
    $editLink = $this->Html->link('Alterar', '/generos/edit/' . $genero['Genero']['id']);
    //$deleteLink = $this->Html->link('Excluir', '/filmes/delete/' . $filme['Filme']['id']);
    //$viewLink = $this->Html->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id']);
    $detalhe[] = array(
        //$viewLink, 
        $genero['Genero']['nome'],
        $editLink
    );
}


$titulos = array('Nome',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/generos/add');

echo $this->Html->tag('h1', 'Generos');
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $this->Html->link('Filmes', '/filmes');
?>