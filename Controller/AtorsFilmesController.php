<?php
App::uses('AppController', 'Controller');

class AtorsFilmesController extends AppController {
    public function delete($id){
        $this->AtorsFilmes->delete($id);
        $this->Flash->set('Ator excluído com sucesso');
        $this->redirect('/filmes/view/');
    }
}

?>