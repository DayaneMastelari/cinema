<?php
App::uses('AppController', 'Controller');

class AtorsController extends AppController {

    public $layout = 'bootstrap';

    public $paginate = array(
        'fields' => array('Ator.id', 'Ator.nome', 'Ator.nascimento'),
        'order' => array('Ator.nome' => 'asc'),
        'conditions' => array(),
        'limit' => 10
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Ator']['nome'])) {
            $this->paginate['conditions'] = array(
                'Ator.nome LIKE' => '%' . trim($this->request->data['Ator']['nome']) . '%'
            );
        }
        $ators = $this->paginate();
        $this->set('ators', $ators);
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Ator->create();
            if ($this->Ator->saveAll($this->request->data)) {
                $this->Flash->set('Ator cadastrado com sucesso');
                $this->redirect('/ators');
            }
        }
        $fields = array('Filme.id', 'Filme.nome');
        $order = array('Filme.nome' => 'asc');
        $filmes = $this->Ator->Filme->find('list', compact('fields', 'order'));
        $this->set('filmes', $filmes);
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Ator->saveAll($this->request->data)) {
                $this->Flash->set('Ator alterado com sucesso');
                $this->redirect('/ators');
            }
        } else {            
            $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
            $conditions = array('Ator.id' => $id);
            $this->request->data = $this->Ator->find('first', compact('fields', 'conditions'));            
        }
        $fields = array('Filme.id', 'Filme.nome');
        $order = array('Filme.nome' => 'asc');
        $filmes = $this->Ator->Filme->find('list', compact('fields', 'order'));
        $this->set('filmes', $filmes);

        pr($this->request->data);
    }

    public function view($id = null) {
            $fields = array('Ator.id', 'Ator.nome', 'Ator.nascimento');
            $conditions = array('Ator.id' => $id);
            $this->request->data = $this->Ator->find('first', compact('fields', 'conditions'));

            /*$fields = array('Filme.id', 'Filme.nome');
            $order = array('Filme.nome' => 'asc');
            $filmes = $this->Ator->Filme->find('all', compact('fields', 'order'));
            $this->set('filmes', $filmes);*/
    }

    public function delete($id) {
        $this->Ator->delete($id);
        $this->Flash->set('Ator excluido com sucesso');
        $this->redirect('/ators');
    }
}
?>