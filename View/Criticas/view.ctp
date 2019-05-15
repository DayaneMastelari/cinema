<?php
$view = $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Nome') .
    $this->Html->div('card-body', $this->request->data['Critica']['nome'])
);
$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Avaliação') .
    $this->Html->div('card-body', $this->request->data['Critica']['avaliacao'])
);
$this->request->data['Critica']['data_avaliacao'] = date('d/m/Y', strtotime($this->request->data['Critica']['data_avaliacao']));
$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Data Avaliação') .
    $this->Html->div('card-body', $this->request->data['Critica']['data_avaliacao'])
);
$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Filme') .
    $this->Html->div('card-body', $this->request->data['Filme']['nome'])
);

$voltarLink = $this->Js->link('Voltar', '/criticas', array('update' => '#content', 'class' => 'btn btn-secondary mt-2'));

echo $this->Html->tag('h1', 'Visualizar Critica');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $view .
    $voltarLink
);

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>