<?php
$novoButton = $this->Html->link('Novo', '/generos/add');

$filtro = $this->Form->create('Genero');
$filtro .= $this->Form->input('Genero.nome', array('required' => false));
$filtro .= $this->Form->end('Filtrar');

$detalhe = array();
foreach ($generos as $genero) {
    $editLink = $this->Html->link('Alterar', '/generos/edit/' . $genero['Genero']['id']);
    $deleteLink = $this->Html->link('Excluir', '/generos/delete/' . $genero['Genero']['id']);
    $viewLink = $this->Html->link($genero['Genero']['nome'], '/generos/view/' . $genero['Genero']['id']);
    $detalhe[] = array(
        $viewLink, 
        $editLink . ' ' . $deleteLink 
    );
}

$paginate = '';
$paginate .= $this->Paginator->first() . '   ';
$paginate .= $this->Paginator->prev() . '   ';
$paginate .= $this->Paginator->next() . '   ';
$paginate .= $this->Paginator->last() . '   ';
$this->Html->para('', $paginate);


$titulos = array('Nome',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);


echo $this->Html->tag('h1', 'Generos');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body);
echo $this->Html->link('Filmes', '/filmes');
echo $paginate;
?>