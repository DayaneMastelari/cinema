<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {
    public $hasAndBelongsToMany = array(
        'Filme'
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Ator']['nascimento'])) {
            $nascimento = str_replace('/', '-', $this->data['Ator']['nascimento']);
            $this->data['Ator']['nascimento'] = date('Y-m-d', strtotime($nascimento));
        }
        
        return true;
    }

    public $validate = array(
        'nome' => array(
            'notBlank' => array(
                'rule' => 'notBlank', 'message' => 'informe o nome'
            ),
            'minLength' => array(
                'rule' => array('minLength', 3), 'message' => 'Informe pelo menos 3 caracteres'
            )
        ),
        'nascimento' => array(
            'notBlank' => array(
                'rule' => 'notBlank', 'message' => 'informe a data de nascimento'
            ),
            'date' => array(
                'rule' => array('date', 'dmy'), 'message' => 'Data Inválida'
            )
        )
    );
}
?>