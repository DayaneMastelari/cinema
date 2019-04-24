<?php
$form = $this->Form->create('Critica');
$form .= $this->Form->input('Critica.nome', array('required' => false));
$form .= $this->Form->input('Critica.filme_id', array(
    'type' => 'select', 
    'empty' => 'Escolha um filme',
    'options' => $filmes,
    'required' => false
));
$form .= $this->Form->input('Critica.avaliacao', array(
    'type' => 'select',
    'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
    'empty' => 'Avaliação',
    'required' => false  
));
$form .= $this->Form->input('Critica.data_avaliacao', array(
    'type' => 'text',
    'text' => 'Data Avaliação'
));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Nova Critica');
echo $form;
echo $voltarLink;
?>