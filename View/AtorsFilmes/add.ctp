<?php
$view = $this->Html->tag('h1', 'Novo ator');
$view .= $this->Html->tag('h2', 'Filme');
$view .= $this->Html->para('', $this->request->data['Filme']['nome']);

$form = $this->Form->create('AtorsFilmes');
$form .= $this->Form->input('Ator.nome', array(
    'type' => 'select', 
    'options' => $ators
));
$form .= $this->Form->end('Gravar');

$voltarButton = $this->Html->link('Voltar', '/filmes/view/' . $this->request->data['Filme']['id']);

echo $view;
echo $form;
echo $voltarButton;

pr($this->request->data)

?>