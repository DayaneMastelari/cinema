<?php
$view = $this->Html->div('card',
    $this->Html->div('card-header', 'Nome') .
    $this->Html->div('card-body', $this->request->data['Usuario']['nome'])
);

$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Login') .
    $this->Html->div('card-body', $this->request->data['Usuario']['login'])
);

$voltarLink = $this->Js->link('Voltar', '/usuarios', array('update' => '#content', 'class' => 'btn btn-secondary mt-2'));

echo $this->Html->tag('h1', 'Visualizar Usuario');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $view .
    $voltarLink
);

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>