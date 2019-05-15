<?php
$form = $this->Form->create('Genero');
$form .=$this->Form->hidden('Genero.id');
$form .= $this->Form->input('Genero.nome', array(
    'label' => false, 
    'placeholder' => 'Gênero',
    'div' => array('class' => 'form-group'),
    'class' => 'form-control mt-4 mb-4',
    'error' => array('attributes' => array('class' => 'invalid-feedback'))
));
$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'div' => false, 'class' => 'btn btn-success mr-2', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/generos', array('class' => 'btn btn-secondary', 'update' => '#content'));
$form .= $this->Form->end();

echo $this->Html->tag('h1', 'Alterar Genero');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $form
);

$this->Js->buffer('$(".form-error").addClass("is-invalid")');
if($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>