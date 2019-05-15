<?php
$view = $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Genero') .
    $this->Html->div('card-body', $this->request->data['Genero']['nome'])
);

$filmesDiv = '';
foreach ($this->request->data['Filme'] as $filme) {
    $filmes = $filme['nome'] . ' - Ano: ' . $filme['ano'] . ' - Duração: ' . $filme['duracao'] . ' - Idioma: ' . $filme['idioma'];
    $filmesDiv .= $this->Html->para('', $filmes);
}
$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Filmes') .
    $this->Html->div('card-body', $filmesDiv)
);

$voltarLink = $this->Js->link('Voltar', '/generos', array('update' => '#content', 'class' => 'btn btn-secondary mt-2'));

echo $this->Html->tag('h1', 'Visualizar Genero');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $view .
    $voltarLink
);

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>