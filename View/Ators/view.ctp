<?php
$view = $this->Html->div('card',
    $this->Html->div('card-header', 'Ator') .
    $this->Html->div('card-body', $this->request->data['Ator']['nome'])
);

$filmesDiv = '';
foreach ($this->request->data['Filme'] as $filme) {
    $filmes = $filme['nome'] . 
    ' - Duração: ' . $filme['duracao'] . 
    ' - Ano: ' . $filme['ano'] . 
    ' - Idioma: ' . $filme['idioma'];
    $filmesDiv .= $this->Html->para('', $filmes);
}
$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Filmes') .
    $this->Html->div('card-body', $filmesDiv)
);

$voltarButton = $this->Js->link('Voltar', '/ators', array('class' => 'btn btn-secondary mt-2', 'update' => '#content'));

echo $this->Html->tag('h1', 'Visualizar Ator');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $view .
    $voltarButton
);

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>