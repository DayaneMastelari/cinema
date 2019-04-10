<?php
App::uses('AppModel', 'Model');

class Genero extends AppModel {
    public $hasMany = array(
        'Filme'
    );
}
?>