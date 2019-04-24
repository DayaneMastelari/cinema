<?php
App::uses('AppModel', 'Model');

class AtorsFilme extends AppModel {

    public $hasMany = array(
        'Ator', 'Filme'
    );
}
?>