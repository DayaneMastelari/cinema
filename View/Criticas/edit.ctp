<?php
$form = $this->Form->create('Critica');
$form .=$this->Form->hidden('Critica.id');
$form .= $this->Html->div('form-row mt-4', 
    $this->Form->input('Critica.nome', array(
        'required' => false,
        'placeholder' => 'Nome',
        'label' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .

    $this->Form->input('Filme.id', array(
        'type' => 'select',
        'options' => $filmes,
        'required' => false,
        'label' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$this->request->data['Critica']['data_avaliacao'] = date('d/m/Y', strtotime($this->request->data['Critica']['data_avaliacao']));
$form .= $this->Html->div('form-row mb-4',
    $this->Form->input('Critica.avaliacao', array(
        'type' => 'select',
        'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),
        'empty' => 'Avaliação',
        'required' => false,
        'label' => false,
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    )) .
    $this->Form->input('Critica.data_avaliacao', array(
        'required' => false,
        'type' => 'text',
        'text' => 'Data Avaliação',
        'label' => false,
        'placeholder' => 'Data Avaliação',
        'div' => array('class' => 'form-group col-md-6'),
        'class' => 'form-control',
        'error' => array('attributes' => array('class' => 'invalid-feedback'))
    ))
);
$form .= $this->Js->submit('Gravar', array('type' => 'submit', 'div' => false, 'class' => 'btn btn-success mr-2', 'update' => '#content'));
$form .= $this->Js->link('Voltar', '/criticas', array('class' => 'btn btn-secondary', 'update' => '#content'));
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