<?php
App::uses('AppModel', 'Model');

class Ator extends AppModel {
    public $hasAndBelongsToMany = array(
        'Filme'
    );
}
?>