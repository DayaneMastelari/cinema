<?php
$form = $this->Form->create('Ator');
$form .= $this->Form->input('Ator.nome');
$form .= $this->Form->input('Ator.nascimento');
$form .= $this->Form->end('Gravar');

$voltarButton = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;
echo $voltarButton;

?>