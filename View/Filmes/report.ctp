<?php
$setings = array(
    'template' => array(
        'header' => array(
            array('cell' => array('text' => 'Filmes Cadastrados', 'align' => 'C', 'fontSizePt' => '20', 'lineHeight' => 20))
        ),
        'columnTitles' => array(            
            array('line' => array(
                'border' => 1,
                'lineHeight' => 8,
                'fontStyle' => 'B',
                array('cell' => array('text' => 'Nome')),
                array('cell' => array('text' => 'Ano', 'lineWidth' => 20)),
                array('cell' => array('text' => 'Gênero', 'lineWidth' => 40)),
            ))
        ),
        'body' => array(
            array('line' => array(
                'border' => 1,
                'lineHeight' => 8,
                array('cell' => array('fieldName' => 'Filme.nome')),
                array('cell' => array('fieldName' => 'Filme.ano', 'lineWidth' => 20)),
                array('cell' => array('fieldName' => 'Genero.nome', 'lineWidth' => 40))
            ))
        ),
        'sumary' => array(
            array('cell' => array('text' => 'Todel de Filmes ==> [RECORD_COUNT]', 'fontStyle' => 'I', 'lineHeight' => 30)),
        ),
        'footer' => array(
            array('line' => array(
                'border' => 'T',
                'fontSizePt' => 6,
                array('cell' => 'Impresso em [DATE]'),
                array('cell' => array('text' => 'Página: [PAGE]/[PAGE]', 'align' => 'R'))
            ))
        )
    ),
    'records' => $filmes
);

echo $this->Report->create($setings);
?>