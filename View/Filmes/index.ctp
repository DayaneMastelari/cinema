<?php
$novoButton = $this->Html->link('Novo', '/filmes/add');

$filtro = $this->Form->create('Filme');
$filtro .= $this->Form->input('Filme.nome', array('required' => false));
$filtro .= $this->Form->end('Filtrar');

$detalhe = array();
foreach ($filmes as $filme) {
    $editLink = $this->Html->link('Alterar', '/filmes/edit/' . $filme['Filme']['id']);
    $deleteLink = $this->Html->link('Excluir', '/filmes/delete/' . $filme['Filme']['id']);
    $viewLink = $this->Html->link($filme['Filme']['nome'], '/filmes/view/' . $filme['Filme']['id']);
    $detalhe[] = array(
        $viewLink, 
        $filme['Filme']['ano'],
        $filme['Genero']['nome'],
        $editLink . ' ' . $deleteLink
    );
}


$titulos = array('Nome', 'Ano', 'Gênero',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);

$generosButton = $this->Html->link('    Generos', '/generos');
$criticasButton = $this->Html->link('    Criticas', '/criticas');
$atoresButton = $this->Html->link('    Atores', '/ators');

$paginate = '';
$paginate .= $this->Paginator->first() . '   ';
$paginate .= $this->Paginator->prev() . '   ';
$paginate .= $this->Paginator->next() . '   ';
$paginate .= $this->Paginator->last() . '   ';
$this->Html->para('', $paginate);

echo $this->Html->tag('h1', 'Filmes');
echo $novoButton;
echo $generosButton;
echo $criticasButton;
echo $atoresButton;
echo $filtro;
echo $this->Html->tag('table', $header . $body);
echo $paginate;
?>
