<?php
$view = $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Filme']['nome']);
$view .= $this->Html->tag('h2', 'Duração');
$view .= $this->Html->para('', $this->request->data['Filme']['duracao']);
$view .= $this->Html->tag('h2', 'Idioma');
$view .= $this->Html->para('', $this->request->data['Filme']['idioma']);
$view .= $this->Html->tag('h2', 'Ano');
$view .= $this->Html->para('', $this->request->data['Filme']['ano']);

$view .= $this->Html->tag('h2', 'Críticas');
foreach ($this->request->data['Critica'] as $critica) {
    $criticas = $critica['nome'] . ' - ' . date('d/m/Y', strtotime($critica['data_avaliacao'])) . ' - Avaliação: ' . $critica['avaliacao'];
    $view .= $this->Html->para('', $criticas);
}

$view .= $this->Html->tag('h2', 'Atores');
$view  .= $this->Html->link('Novo Ator', '/ators_filmes/add');
foreach ($this->request->data['Ator'] as $ator) {
    $atores = $ator['nome'] . ' - ' . date('d/m/Y', strtotime($ator['nascimento'])) . ' - ' . $this->Html->link('Excluir', '/atorsfilmes/delete/' . $ator['id']);
    $view .= $this->Html->para('', $atores);
}


$voltarLink = $this->Html->link('Voltar', '/filmes');

echo $this->Html->tag('h1', 'Visualizar Filme');
echo $view;
echo $voltarLink;
?>
