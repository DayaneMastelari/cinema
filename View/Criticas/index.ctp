<?php
$novoButton = $this->Html->link('Novo', '/criticas/add', array('class' => 'btn btn-success float-right'));

$filtro = $this->Form->create('Critica', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Critica.nome', array(
    'required' => false,
    'label' => array('text' => 'Nome', 'class' => 'sr-only'),
    'class' => 'form-control mb-2 mr-sm-2',
    'placeholder' => 'Nome'
));
$filtro .= $this->Form->button('Filtrar', array('type' => 'submit', 'class' => 'btn btn-primary mb-2'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mb-4 mt-4',
    $this->Html->div('col-md-6', $filtro) .
    $this->Html->div('col-md-6', $novoButton)
);

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

$titulos = array('Nome', 'Filme', 'Avaliação', 'Data',  '');
$header = $this->Html->tableHeaders($titulos);
$body = $this->Html->tableCells($detalhe);

$links = array(
    $this->Paginator->first('Primeira', array('class' => 'page-link')),
    $this->Paginator->prev('Anterior', array('class' => 'page-link')),
    $this->Paginator->next('Próxima', array('class' => 'page-link')),
    $this->Paginator->last('Última', array('class' => 'page-link'))
);
$paginate = $this->Html->nestedList($links, array('class' => 'pagination'), array('class' => 'page-item'));
$paginate = $this->Html->tag('nav', $paginate);
$paginateCount = $this->Html->para('', $this->Paginator->counter(
    '{:page} de {:pages}, Mostrando {:current} registros de {:count}, Começando em {:start}, até {:end}'
));

$paginateBar = $this->Html->div('row',
    $this->Html->div('col-md-6', $paginate) .
    $this->Html->div('col-md-6', $paginateCount)
);


echo $this->Html->tag('h1', 'Criticas');
echo $filtroBar;
echo $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'));
echo $paginateBar;
?>
