<?php
App::uses('AppController', 'Controller');

class GenerosController extends AppController {

    public function index(){
        $fields = array('Genero.id', 'Genero.nome');
        $order = array('Genero.nome' => 'asc');
        $generos = $this->Genero->find('all', compact('fields', 'order'));

        $this->set('generos', $generos);
    }

    public function add(){
        if(!empty($this->request->data)){
            $this->Genero->create();
            if($this->Genero->save($this->request->data)){
                $this->Flash->set('Genero incluido com sucesso');
                $this->redirect('/generos');
            }
        }
    }

    public function edit($id = null){
        if (!empty($this->request->data)) {
            if($this->Genero->save($this->request->data)) {
                $this->Flash->set('Genero alterado com sucesso');
                $this->redirect('/generos');
            }
        } else {
            $fields = array('Genero.id', 'Genero.nome');
            $conditions = array('Genero.id' => $id);
            $this->request->data = $this->Genero->find('first', compact('fields', 'conditions'));
        }

    }

    public function delete($id){
        $this->Genero->delete($id);
        $this->Flash->set('Genero excluido com sucesso');
        $this->redirect('/generos');

    }

    public function view($id = null){
        $fields = array('Genero.id', 'Genero.nome');
            $conditions = array('Genero.id' => $id);
            $this->request->data = $this->Genero->find('first', compact('fields', 'conditions'));
    }
}

?>