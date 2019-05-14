<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->hidden('Filme.id');
$form .= $this->Html->div('form-row mt-4', 
    $this->Form->input('Filme.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'placeholder' => 'Nome',
        'label' => false
    )) .
    $this->Form->input('Filme.idioma', array(
        'label' => false,
        'type' => 'select',
        'options' => array(
            'Inglês' => 'Inglês', 
            'Português' => 'Português', 
            'Espanhol' => 'Espanhol', 
            'Francês' => 'Francês'
        ),
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'   
    ))
);

$form .= $this->Html->div('form-row',
    $this->Form->input('Filme.duracao', array(
        'label' => array('text' => 'Duração'), 
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'label' => false,
        'placeholder' => 'Duração'
    )) . 
    $this->Form->input('Filme.ano', array(
        'type' => 'text', 
        'maxlength' => 4,
        'label' => false,
        'placeholder' => 'Ano',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    ))

);
$form .= $this->Form->input('Filme.genero_id', array(
    'label' => false,
    'type' => 'select',
    'options' => $generos,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control mb-4'
));

$form .= $this->Form->button('Gravar', array('type' => 'submit', 'class' => 'btn btn-success mr-4'));
$form .= $this->Js->link('Voltar', '/filmes', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Filme');
echo $form;
?>

