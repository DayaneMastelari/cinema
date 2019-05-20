<?php
$form = $this->Form->create('Usuarios');
$form .= $this->Form->hidden('Usuario.id');
$form .= $this->Form->input('Usuario.nome', array(
        'label' => false,
        'required' => false,
        'placeholder' => 'Nome',
        'div' => array('class' => 'form-group'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
)); 
    
$form .= $this->Html->div('form-row mt-4',
    $this->Form->input('Usuario.login', array(
        'label' => false,
        'required' => false,
        'placeholder' => 'Login',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Usuario.senha', array(
        'type' => 'password',
        'label' => false,
        'required' => false,
        'placeholder' => 'Senha',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);

$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'class' => 'btn btn-success mr-2', 'div' => false, 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/usuarios', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Usuario');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $form
);

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}

?>