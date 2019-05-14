<?php
$form = $this->Form->create('Filme');
$form .= $this->Form->hidden('Filme.id');
$form .= $this->Html->div('form-row mt-4', 
    $this->Form->input('Filme.nome', array(
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'placeholder' => 'Nome',
        'label' => false,
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
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
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback')) 
    ))
);

$form .= $this->Html->div('form-row',
    $this->Form->input('Filme.duracao', array(
        'label' => array('text' => 'Duração'), 
        'required' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'label' => false,
        'placeholder' => 'Duração',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) . 
    $this->Form->input('Filme.ano', array(
        'type' => 'text', 
        'maxlength' => 4,
        'label' => false,
        'placeholder' => 'Ano',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))

);
$form .= $this->Form->input('Filme.genero_id', array(
    'label' => false,
    'type' => 'select',
    'options' => $generos,
    'div' => array('class' => 'form-group'),
    'class' => 'form-control mb-4',
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
));

$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'div' => false, 'class' => 'btn btn-success mr-2', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/filmes', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Novo Filme');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',    
    $form
);

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if ($this->request->is('ajax')){
    echo $this->Js->writeBuffer();
}
?>

