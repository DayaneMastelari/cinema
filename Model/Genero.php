<?php
App::uses('AppModel', 'Model');

class Genero extends AppModel {
    public $hasMany = array(
        'Filme'
    );


    public $validate = array(
        'nome' => array(
            'notBlank' => array('rule' => 'notBlank', 'message' => 'preencha o nome'),
            'minLength' => array('rule' => array('minLength', '3'), 'message' => 'Informe pelo menos 3 caracteres'),
            'isUnique' => array('rule' => 'isUnique', 'message' => 'Gênero já exististente')
        ),
    );
}
?>