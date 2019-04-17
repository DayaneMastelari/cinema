<?php
$form = $this->Form->create('Ator');
$form .= $this->Form->input('Ator.nome');
$form .= $this->Form->input('Ator.nascimento', array(
    'type' => 'text'
));
/*$form .= $this->Form->dateTime('Ator.nascimento', 'DMY', 'null',
    array(
        'type' => 'text',
        'minYear' => '1900',
        'maxYear' => '2019',
        'empty' => array(
            'day' => 'Dia', 'month' => 'Mês', 'year' => 'Ano',
            'hour' => 'HOUR', 'minute' => 'MINUTE', 'meridian' => false
        )
    )
);*/
$form .= $this->Form->input('Filme.Filme', array(
    'type' => 'select',
    'multiple' => true,
    'options' => $filmes
));
$form .= $this->Form->end('Gravar');

$voltarButton = $this->Html->link('Voltar', '/ators');

echo $this->Html->tag('h1', 'Novo Ator');
echo $form;
echo $voltarButton;

?>