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
            pr($this->request->data);
            $this->Ator->create();
            if ($this->Ator->saveAll($this->request->data)){
                $this->Flash->set('Ator cadastrado com sucesso');
                $this->redirect('/ators');
            }
        }
        $fields = array('Filme.id', 'Filme.nome');
        $order = array('Filme.nome' => 'asc');
        $filmes = $this->Ator->Filme->find('list', compact('fields', 'order'));
        $this->set('filmes', $filmes);
    }

    public function delete($id) {
        $this->Ator->delete($id);
        $this->Flash->set('Ator excluido com sucesso');
        $this->redirect('/ators');
    }
}
?>