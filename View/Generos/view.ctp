<?php
$view = $this->Html->tag('h2', 'Genero');
$view .= $this->Html->para('', $this->request->data['Genero']['nome']);

$view .= $this->Html->tag('h3', 'Filmes');
foreach ($this->request->data['Filme'] as $filme) {
    $filmes = $filme['nome'] . ' - Ano: ' . $filme['ano'] . ' - Duração: ' . $filme['duracao'] . ' - Idioma: ' . $filme['idioma'];
    $view .= $this->Html->para('', $filmes);
}

$voltarLink = $this->Html->link('Voltar', '/generos');

echo $this->Html->tag('h1', 'Visualizar Genero');
echo $view;
echo $voltarLink;

?>