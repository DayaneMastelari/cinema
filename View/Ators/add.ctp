<?php
$form = $this->Form->create('Ator');
$form .= $this->Html->div('form-row mt-4',
    $this->Form->input('Ator.nome', array(
        'required' => false,
        'label' => false,
        'placeholder' => 'Nome',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Ator.nascimento', array(
        'type' => 'text', 
        'required' => false,
        'label' => false,
        'placeholder' => 'Nascimento',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'multiple' => true,
    'options' => $filmes,
    'label' => array('text' => 'Ator(es)'),
    'placeholder' => 'Nome',
    'div' => array('class' => 'form-group'),
    'class' => 'form-control mb-4',
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
));
$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'div' => false, 'class' => 'btn btn-success mr-2', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/ators', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Ator');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $form
);

?>