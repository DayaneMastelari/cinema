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
}

?>