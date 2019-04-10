<?php
$view = $this->Html->tag('h2', 'Nome');
$view .= $this->Html->para('', $this->request->data['Filme']['nome']);

$view .= $this->Html->tag('h2', 'Críticas');
foreach ($this->request->data['Critica'] as $critica) {
    $criticas = $critica['nome'] . ' - ' . date('d/m/Y', strtotime($critica['data_avaliacao'])) . ' - Avaliação: ' . $critica['avaliacao'];
    $view .= $this->Html->para('', $criticas);
}

$voltarLink = $this->Html->link('Voltar', '/criticas');

echo $this->Html->tag('h1', 'Visualizar Criticas');
echo $view;
echo $voltarLink;
?>