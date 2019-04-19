<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {
    public $hasAndBelongsToMany = array(
        'Filme'
    );

    public function beforeSave($options = array()) {
        if (!empty($this->data['Ator']['nascimento'])) {
            $this->data['Ator']['nascimento'] = date('Y-m-d', strtotime($this->data['Ator']['nascimento']));
        }
        
        return true;
    }
}
?>