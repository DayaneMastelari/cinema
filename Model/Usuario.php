<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Usuario extends AppModel {

    public function beforeSave($options = array())  {
        if (!empty($this->data['Usuario']['senha'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data['Uduario']['senha'] = $passwordHasher->hash(
                $this->data['Usuario']['senha']
            );
        }

        return true;
    }
}
?>