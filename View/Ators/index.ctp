<?php
$novoButton = $this->Js->link('Novo', '/ators/add', array('class' => 'btn btn-success float-right', 'update' => '#content'));

$filtro = $this->Form->create('Ators', array('class' => 'form-inline'));
$filtro .= $this->Form->input('Ator.nome', array(
    'required' => false,
    'label' => array('class' => 'sr-only'),
    'placeholder' => 'Buscar por nome',
    'class' => 'form-control mb-2 mr-sm-2'
));
$filtro .= $this->Js->submit('Filtrar', array('type' => 'submit', 'class' => 'btn btn-primary mb-2', 'update' => '#content'));
$filtro .= $this->Form->end();

$filtroBar = $this->Html->div('row mt-4 mb-4',
    $this->Html->div('col-md-6', $filtro) .
    $this->Html->div('col-md-6', $novoButton)
);

$detalhe = array();
foreach ($ators as $ator){
    $editLink = $this->Js->link('Alterar', '/ators/edit/' . $ator['Ator']['id'], array('update' => '#content'));
    $deleteLink = $this->Js->link('Excluir', '/ators/delete/' . $ator['Ator']['id'], array('update' => '#content'));
    $viewLink = $this->Js->link($ator['Ator']['nome'], '/ators/view/' . $ator['Ator']['id'], array('update' => '#content'));
    $detalhe[] = array(
        $viewLink,
        date('d/m/Y', strtotime($ator['Ator']['nascimento'])),
        $editLink . ' ' . $deleteLink
    );
}

$titulos = array('Nome', 'Data Nascimento', '');
$header = $this->Html->tag('thead', $this->Html->tableHeaders($titulos));
$body = $this->Html->tableCells($detalhe);

$this->Paginator->options(array('update' => '#content'));

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

echo $this->Flash->render('success');
echo $this->Flash->render('warning');

echo $this->Html->tag('h1', 'Atores');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $filtroBar .
    $this->Html->tag('table', $header . $body, array('class' => 'table table-hover'))
);
echo $paginateBar;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>