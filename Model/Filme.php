<?php
App::uses('AppModel', 'Model');

class Filme extends AppModel {

    public $belongsTo = array(
        'Genero'
    );

    public $hasMany = array(
        'Critica'
    );

    public $hasAndBelongsToMany = array(
        'Ator'
    );

    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o nome')
        ),
        'duracao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o duração')
        ),
        'ano' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Informe o ano de lançamento do filme'),
            'date' => array('rule' => array('date', 'dmy'), 'message' => 'Data Inválida')
        )
    );

    public function testAnoMenorQueFilme() {
        $checked = array('data_avaliacao' => $currentDate = date('d-m-y'););
        $this->Critica->set(array('filme_id' => 1));
        $valid = $this->Critica->anoMaiorIgualFilme($checked);

        $this->assertFalse($valid);

    }

}
?>