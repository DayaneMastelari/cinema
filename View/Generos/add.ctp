<?php
$form = $this->Form->create('Genero');
$form .= $this->Form->input('Genero.nome');
$form .=$this->Form->end('Gravar');

$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h1', 'Novo Genero');
echo $form;
echo $voltarLink;
?>