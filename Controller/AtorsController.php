<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {

    public function index() {
        $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
        $ators = $this->Ator->find('all', compact('fields'));

        $this->set('ators', $ators);
    }

    public function add() {
        if (!empty($this->request->data)){
            $this->Ator->create();
            if ($this->Ator->save($this->request->data)){
                $this->Flash->set('Ator cadastrado com sucesso');
                $this->redirect('/ators');
            }
        }
        $fields = array('Filme.id', 'Filme.nome');
        $order
    }
}
?>