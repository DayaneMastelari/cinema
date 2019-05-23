<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {

    public $layout = 'bootstrap';
    public $helper = array('Js' => array('Jquerry'));


    public $paginate = array(
        'fields' => array('Critica.id', 'Critica.nome', 'Filme.nome', 'Critica.avaliacao', 'Critica.data_avaliacao'),
        'order' => array('Critica.nome' => 'asc'),
        'conditions' => array(),
        'limit' => 10
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Critica']['nome'])) {
            $this->paginate['conditions'] = array(
                'Critica.nome LIKE' => '%' . trim($this->request->data['Critica']['nome']) . '%'
            );
        }
        
        $criticas = $this->paginate();
        $this->set('criticas', $criticas);        
    } 

    public function add() {
        if (!empty($this->request->data)) {
            $this->Critica->create();
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->bootstrap('Critica gravada com sucesso!', array('key' => 'success'));
                $this->redirect('/criticas');
            }
        }
        $fields = array('Filme.id', 'Filme.nome');
        $filmes = $this->Critica->Filme->find('list', compact('fields'));
        $this->set('filmes', $filmes); 
    }


    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->bootstrap('Critica alterada com sucesso!', array('key' => 'success'));
                $this->redirect('/criticas');
            }
        } else {
            $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao');
            $conditions = array('Critica.id' => $id);
            $this->request->data = $this->Critica->find('first', compact('fields', 'conditions'));
        }
        $fields = array('Filme.id', 'Filme.nome');
        $order = array('Filme.nome' => 'asc');
        $filmes = $this->Critica->Filme->find('list', compact('fields', 'order'));
        $this->set('filmes', $filmes);
    }

    public function view($id = null) {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome');
        $conditions = array('Critica.id' => $id);
        $this->request->data = $this->Critica->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Critica->delete($id);
        $this->Flash->bootstrap('Critica excluída com sucesso!', array('key' => 'warning'));
        $this->redirect('/criticas');
    }

}
