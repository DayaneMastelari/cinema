<?php
$form = $this->Form->create('Critica');
$form .=$this->Form->hidden('Critica.id');
$form .= $this->Html->div('form-row mt-4', 
    $this->Form->input('Critica.nome', array(
        'required' => false,
        'placeholder' => 'Nome',
        'label' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    )) .

    $this->Form->input('Critica.filme_id', array(
        'type' => 'select', 
        'empty' => 'Escolha um filme',
        'options' => $filmes,
        'required' => false,
        'label' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    ))
);
$form .= $this->Html->div('form-row mb-4',
    $this->Form->input('Critica.avaliacao', array(
        'type' => 'select',
        'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
        'empty' => 'Avaliação',
        'required' => false,
        'label' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    )) .
    $this->Form->input('Critica.data_avaliacao', array(
        'required' => false,
        'type' => 'text',
        'text' => 'Data Avaliação',
        'label' => false,
        'placeholder' => 'Data Avaliação',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    ))
);
$form .= $this->Form->button('Alterar', array('type' => 'submit', 'class' => 'btn btn-success mr-4'));
$form .= $this->Html->link('Voltar', '/criticas', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Nova Critica');
echo $form;
?>