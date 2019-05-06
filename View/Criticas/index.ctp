<?php
$novoButton = $this->Html->link('Novo', '/criticas/add');

$filtro = $this->Form->create('Critica');
$filtro .= $this->Form->input('Critica.nome', array('required' => false));
$filtro .= $this->Form->end('Filtar');


$detalhe = array();
foreach ($criticas as $critica) {
    $editLink = $this->Html->link('Alterar', '/criticas/edit/' . $critica['Critica']['id']);
    $deleteLink = $this->Html->link('Excluir', '/criticas/delete/' . $critica['Critica']['id']);
    $viewLink = $this->Html->link($critica['Filme']['nome'], '/criticas/view/' . $critica['Critica']['id']);
    $detalhe[] = array(
        $critica['Critica']['nome'],
        $viewLink,
        $critica['Critica']['avaliacao'],
        date('d/m/Y', strtotime($critica['Critica']['data_avaliacao'])),
        $editLink . ' ' . $deleteLink
    );
}

$paginate = '';
$paginate .= $this->Paginator->first() . '   ';
$paginate .= $this->Paginator->prev() . '   ';
$paginate .= $this->Paginator->next() . '   ';
$paginate .= $this->Paginator->last() . '   ';
$this->Html->para('', $paginate);



$titulos = array('Nome', 'Filme', 'Avaliação', 'Data',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);
$filmesButton = $this->Html->link('Filmes', '/filmes');

echo $this->Html->tag('h1', 'Criticas');
echo $novoButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body);
echo $filmesButton;
echo $paginate;
?>
