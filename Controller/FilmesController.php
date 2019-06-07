<?php
App::uses('AppController', 'Controller');

class FilmesController extends AppController {

    public $layout = 'bootstrap';
    public $helper = array('Js' => array('Jquerry'));
    public $components = array('RequestHandler');

    public $paginate = array(
        'fields' => array('Filme.id', 'Filme.nome', 'Filme.ano', 'Genero.nome'),
        'conditions' => array(),
        'order' => array('Filme.nome' => 'asc'),
        'limit' => 10,
    );

    public function index() {
        if ($this->request->is('post') && !empty($this->request->data['Filme']['nome'])){
            $this->paginate['conditions'] = array(
                'Filme.nome LIKE' => '%' . trim($this->request->data['Filme']['nome']) . '%'
            );
        }
        $filmes = $this->paginate();
        $this->set('filmes', $filmes);      
    }

    public function add() {
        if (!empty($this->request->data)) {
            $this->Filme->create();
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->bootstrap('Filme gravado com sucesso!', array('key' => 'success'));
               $this->redirect('/filmes');
            }
        }
        $fields = array('Genero.id', 'Genero.nome');
        $order = array('Genero.nome' => 'asc');
        $generos = $this->Filme->Genero->find('list', compact('fields', 'order'));
        $this->set('generos', $generos);        
    }

    public function edit($id = null) {
        if (!empty($this->request->data)) {
            if ($this->Filme->save($this->request->data)) {
                $this->Flash->bootstrap('Filme alterado com sucesso!', array('key' => 'success'));
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
        $this->Flash->bootstrap('Filme excluído com sucesso!', array('key' => 'warning'));
        $this->redirect('/filmes');
    }

    public function report() {
        $this->layout = false;
        $this->response->type('pdf');
        $fields = array('Filme.nome', 'Filme.ano', 'Genero.nome');
        $filmes = $this->Filme->find('all', compact('fields'));
        $this->set('filmes', $filmes);
    }

}
