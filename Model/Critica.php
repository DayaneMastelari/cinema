<?php
App::uses('AppModel', 'Model');

class Critica extends AppModel {
    public $belongsTo = array(
        'Filme'
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Critica']['data_avaliacao'])) {
            $avaliacao = str_replace('/', '-', $this->data['Critica']['data_avaliacao']);
            $this->data['Critica']['data_avaliacao'] = date('Y-m-d', strtotime($avaliacao));
        }
        
        return true;
    }

    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Preencha o campo'),
            'minLength' => array('rule' => array('minLength', 3), 'message' => 'Informe ao menos 3 caracteres')
        ),
        'avaliacao' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Preencha o campo'),
            'range' => array('rule' => array('range', 1, 5), 'message' => 'Escolha um valor entre 1 a 5')
        ),
        'filme_id' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'Escolha um filme')
        ),
        'data_avaliacao' => array(
            'anoMaiorIgualFilme' => array('rule' => 'anoMaiorIgualFilme', 'message' => 'Informar uma data maior ou igual ao ano do filme')
        )
    );

    public function anoMaiorIgualFilme($checked) {
        $anoMaiorIgualFilme = true;
        $data = array_values($checked);
        if (!empty($data) && $this->data['Critica']['filme_id']) {
            $filmeAno = $this->Filme->field('ano', array('Filme.id' => $this->data['Critica']['filme_id']));
            $ano = substr($data[0], 6, 4);
            $anoMaiorIgualFilme = $ano >= $filmeAno;
        }
        return $anoMaiorIgualFilme;
    }
}
?>