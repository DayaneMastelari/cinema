<?php
$view = $this->Html->tag('h2', 'Critica');
$view .= $this->Html->tag('h4', 'Nome');
$view .= $this->Html->para('', $this->request->data['Critica']['nome']);
$view .= $this->Html->tag('h4', 'Avaliação');
$view .= $this->Html->para('', $this->request->data['Critica']['avaliacao']);
$view .= $this->Html->tag('h4', 'Data Avaliação');
$view .= $this->Html->para('', $this->request->data['Critica']['data_avaliacao']);

$view .= $this->Html->tag('h2', 'Filme');
$view .= $this->Html->para('', $this->request->data['Filme']['nome']);

$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Visualizar Criticas');
echo $view;
echo $voltarLink;
?>