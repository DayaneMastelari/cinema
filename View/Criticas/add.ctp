<?php
$form = $this->Form->create('Critica');
$form .= $this->Form->input('Critica.nome');
$form .= $this->Form->input('Critica.filme_id', array(
    'type' => 'select', 
    'options' => $filmes
));
$form .= $this->Form->input('Critica.avaliacao', array(
    'type' => 'select',
    'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5')    
));
$form .= $this->Form->input('Critica.data_avaliacao');
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Nova Critica');
echo $form;
echo $voltarLink;
?>