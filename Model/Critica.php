<?php
App::uses('AppModel', 'Model');

class Critica extends AppModel {
    public $belongsTo = array(
        'Filme'
    );
}
?>