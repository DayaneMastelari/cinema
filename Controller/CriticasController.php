<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {

    public function index() {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Filme.nome');
        $criticas = $this->Critica->find('all', compact('fields'));

        $this->set('criticas', $criticas);        
    } 

    public function add() {
        if (!empty($this->request->data)) {
            $this->Critica->create();
            if ($this->Critica->save($this->request->data)) {
                $this->Flash->set('Critica gravada com sucesso!');
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
                $this->Flash->set('Critica alterada com sucesso!');
                $this->redirect('/criticas');
            }
        } else {
            $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao', 'Critica.filme_id');
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
        $this->request->data = $this->Critica->find('all', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Critica->delete($id);
        $this->Flash->set('Critica excluída com sucesso!');
        $this->redirect('/criticas');
    }

}
