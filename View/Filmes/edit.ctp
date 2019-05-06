<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->hidden('Filme.id');
$form .= $this->Form->input('Filme.nome', array(
    'required' => false
));
$form .= $this->Form->input('Filme.idioma', array(
    'type' => 'select',
    'required' => false,
    'options' => array('Inglês' => 'Inglês', 'Português' => 'Português', 'Espanhol' => 'Espanhol', 'Francês' => 'Francês')    
));
$form .= $this->Form->input('Filme.duracao', array(
    'required' => false
));
$form .= $this->Form->input('Filme.ano');
$form .= $this->Form->input('Filme.genero_id', array(
    'type' => 'select', 
    'options' => $generos,
));
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/filmes');

echo $this->Html->tag('h1', 'Alterar Filme');
echo $form;
echo $voltarLink;
?>
