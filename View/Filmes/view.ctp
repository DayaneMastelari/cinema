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
foreach ($this->request->data['Ator'] as $ator) {
    $atores = $ator['nome'] . ' - ' . date('d/m/Y', strtotime($ator['nascimento'])) . ' - ' . $this->Js->link('Excluir', '/ators_filmes/delete/' . $ator['AtorsFilme']['id'] . '/' . $this->request->data['Filme']['id'], array('update' => '#content'));
    $view .= $this->Html->para('', $atores);
}


$voltarLink = $this->JS->link('Voltar', '/filmes', array('update' => '#content'));

echo $this->Html->tag('h1', 'Visualizar Filme');
echo $view;
echo $voltarLink;

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>
