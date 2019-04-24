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
        )
    );
}
?>