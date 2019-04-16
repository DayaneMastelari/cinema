<?php
$form = $this->Form->create('Critica');
$form .=$this->Form->hidden('Critica.id');
$form .= $this->Form->input('Critica.nome');
$form .= $this->Form->input('Critica.filme_id', array(
    'type' => 'select', 
    'options' => $filmes
));
$form .= $this->Form->input('Critica.avaliacao', array(
    'type' => 'select',
    'options' => array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5')    
));
$form .= $this->Form->dateTime('Critica.data_avaliacao', 'DMY', 'null',
    array(
        'type' => 'text',
        'minYear' => '1900',
        'maxYear' => '2019',
        'empty' => array(
            'day' => 'Dia', 'month' => 'Mês', 'year' => 'Ano',
            'hour' => 'HOUR', 'minute' => 'MINUTE', 'meridian' => false
        )
    )
);
$form .= $this->Form->end('Gravar');
$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Nova Critica');
echo $form;
echo $voltarLink;
?>