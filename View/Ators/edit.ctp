<?php
$form = $this->Form->create('Ator');
$data = date('d/m/Y', strtotime($this->request->data['Ator']['nascimento']));
pr($data);
$form .= $this->Form->hidden('Ator.id');
$form .= $this->Html->div('form-row mt-4',
    $this->Form->input('Ator.nome', array(
        'required' => false,
        'label' => false,
        'placeholder' => 'Nome',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    )) .
    $this->Form->input('Ator.nascimento', array(
        'type' => 'text', 
        'required' => false,
        'label' => false,
        'placeholder' => 'Nascimento',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control'
    ))
);
$form .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'multiple' => true,
    'options' => $filmes,
    'label' => array('text' => 'Ator(es)'),
    'placeholder' => 'Nome',
    'div' => array('class' => 'form-group'),
    'class' => 'form-control mb-4'
));
$form .= $this->Form->button('Alterar', array('type' => 'submit', 'class' => 'btn btn-success mr-4'));
$form .= $this->Html->link('Voltar', '/ators', array('class' => 'btn btn-secondary'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;

?>