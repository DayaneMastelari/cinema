<?php
$view = $this->Html->tag('h2', 'Ator');
$view .= $this->Html->para('', $this->request->data['Ator']['nome']);

$view .= $this->Html->tag('h2', 'Filmes');
foreach ($this->request->data['Filme'] as $filme) {
    $filmes = $filme['nome'] . 
    ' - Duração: ' . $filme['duracao'] . 
    ' - Ano: ' . $filme['ano'] . 
    ' - Idioma: ' . $filme['idioma'];
    $view .= $this->Html->para('', $filmes);
}

$voltarButton = $this->Html->link('Voltar', '/ators');

echo $view;
echo $voltarButton;
?>