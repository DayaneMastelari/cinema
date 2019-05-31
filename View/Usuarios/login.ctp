<?php
$form = $this->Form->create('Usuarios', array('class' => 'form-signin'));
$form .= $this->Html->tag('h1', 'Login do Usuário', array('class' => 'h3 mb-3 font-weight-normal'));
$form .= $this->Form->input('Usuario.login', array(
    'label' => false,
    'required' => false,
    'placeholser' => 'Usuário',
    'class' => 'form-control',
    'div' => false,
    'error' => array('attributes' => array('class' => 'invalid-feedback'))

));
$form .= $this->Form->input('Usuario.senha', array(
    'label' => false,
    'type' => 'password',
    'required' => false,
    'placeholser' => 'Senha',
    'class' => 'form-control',
    'div' => false,
    'error' => array('attributes' => array('class' => 'invalid-feedback')) 

));
$form .= $this->Form->submit('Entrar', array('div' => false, 'class' => 'btn btn-success btn-lg btn-block mb-3'));
$form .= $this->Flash->render('danger'); 
$form .= $this->Flash->render('warning'); 
$form .= $this->Form->end();

echo $form;

$this->Js->buffer('$(".form-error").addClass("is-invalid");');
if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>