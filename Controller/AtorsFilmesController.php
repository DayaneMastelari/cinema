<?php
App::uses('AppController', 'Controller');

class AtorsFilmesController extends AppController {
    public function delete($id, $filmeId) {
        $this->AtorsFilme->delete($id);
        $this->Flash->set('Excluido com sucesso');
        $this->redirect('/filmes/view/' . $filmeId);
    }

    
}

?>