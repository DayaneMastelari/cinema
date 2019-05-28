<?php
$view = $this->Html->div('card',
    $this->Html->div('card-header', 'Nome') .
    $this->Html->div('card-body', $this->request->data['Filme']['nome'])
);

$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Duração') .
    $this->Html->div('card-body', $this->request->data['Filme']['duracao'])
);

$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Idioma') .
    $this->Html->div('card-body', $this->request->data['Filme']['idioma'])
);

$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Ano') .
    $this->Html->div('card-body', $this->request->data['Filme']['ano'])
);

$criticaDiv = '';
foreach ($this->request->data['Critica'] as $critica) {
    $criticas = $critica['nome'] . ' - ' . date('d/m/Y', strtotime($critica['data_avaliacao'])) . ' - Avaliação: ' . $critica['avaliacao']; 
    $criticaDiv .= $this->Html->tag('br', $criticas);
}

$view .= $this->Html->div('card mt-2',
    $this->Html->div('card-header', 'Críticas') .
    $this->Html->para('card-body', $criticaDiv)
);

$atorDiv = '';
foreach ($this->request->data['Ator'] as $ator) {
    $atores = $ator['nome'] . ' - ' . date('d/m/Y', strtotime($ator['nascimento'])) . ' - ' . $this->Js->link('Excluir', '/ators_filmes/delete/' . $ator['AtorsFilme']['id'] . '/' . $this->request->data['Filme']['id'], array('update' => '#content'));
    $atorDiv .= $this->Html->tag('br', $atores);
}
$view .= $this->Html->div('card mt-2',
        $this->Html->div('card-header', 'Atores') .
        $this->Html->para('card-body', $atorDiv)
);

$voltarLink = $this->Js->link('Voltar', '/filmes', array('update' => '#content', 'class' => 'btn btn-secondary mt-2'));

echo $this->Html->tag('h1', 'Visualizar Filme');
echo $this->Html->div('my-3 p-3 bg-white rounded shadow-sm',
    $view .
    $voltarLink
);

if ($this->request->is('ajax')) {
    echo $this->Js->writeBuffer();
}
?>