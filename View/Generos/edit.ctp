<?php
$form = $this->Form->create('Genero');
$form .=$this->Form->hidden('Genero.id');
$form .= $this->Form->input('Genero.nome', array(
    'label' => false, 
    'placeholder' => 'Gênero',
    'div' => array('class' => 'form-group'),
    'class' => 'form-control mt-4 mb-4'
));
$form .= $this->Form->button('Alterar', array('type' => 'submit', 'class' => 'btn btn-success mr-4'));
$form .= $this->Html->link('Voltar', '/generos', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h1', 'Novo Genero');
echo $form;
?>