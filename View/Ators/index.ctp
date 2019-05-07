<?php

$filtro = $this->Form->creat('Ators');
$filtro .= $this->Form->input('Ators.nome', array('required' => false));
$filtro .= $this->Form->end('filtrar');

$detalhe = array();
foreach ($ators as $ator){
    $editLink = $this->Html->link('Alterar', '/ators/edit/' . $ator['Ator']['id']);
    $deleteLink = $this->Html->link('Excluir', '/ators/delete/' . $ator['Ator']['id']);
    $viewLink = $this->Html->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id']);
    $detalhe[] = array(
        $viewLink,
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink . ' ' . $deleteLink
    );
}

$paginate = '';
$paginate .= $this->Paginator->first() . '   ';
$paginate .= $this->Paginator->prev() . '   ';
$paginate .= $this->Paginator->next() . '   ';
$paginate .= $this->Paginator->last() . '   ';
$this->Html->para('', $paginate);

$titulos = array('Nome', 'Data Nascimento');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$novoButton = $this->Html->link('Novo', '/ators/add');
$filmesButton = $this->Html->link('Filmes', '/filmes');

echo $this->Html->tag('h1', 'Atores');
echo $filtro;
echo $novoButton;
echo $this->Html->tag('table', $header . $body);
echo $filmesButton;
echo $paginate;
?>