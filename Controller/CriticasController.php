<?php
App::uses('AppController', 'Controller');

class CriticasController extends AppController {

    public function index() {
        $fields = array('Critica.id', 'Critica.nome', 'Critica.avaliacao', 'Critica.data_avaliacao');
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

    /*

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->set('Filme alterado com sucesso!');
                $this->redirect('/filmes');
            }
        } else {
            $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano', 'Filme.genero_id');
            $conditions = array('Filme.id' => $id);
            $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
        }
        $fields = array('Genero.id', 'Genero.nome');
        $order = array('Genero.nome' => 'asc');
        $generos = $this->Filme->Genero->find('list', compact('fields', 'order'));
        $this->set('generos', $generos);        
    }

    public function view($id = null) {
        $fields = array('Filme.id', 'Filme.nome', 'Filme.duracao', 'Filme.idioma', 'Filme.ano');
        $conditions = array('Filme.id' => $id);
        $this->request->data = $this->Filme->find('first', compact('fields', 'conditions'));
    }

    public function delete($id) {
        $this->Filme->delete($id);
        $this->Flash->set('Filme excluído com sucesso!');
        $this->redirect('/filmes');
    }*/

}
