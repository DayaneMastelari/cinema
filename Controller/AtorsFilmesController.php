<?php
App::uses('AppController', 'Controller');

class AtorsFilmesController extends AppController {
    
    public function add($idFilme) {
        if (!empty($this->request->data)) {            
            $this->AtorsFilme->create();
            if ($this->AtorsFilme->saveAll($this->request->data)) {
                $this->Flash->set('Ator adicionado com sucesso');
                $this->redirect('/ators/view/' . $idFilme);
            }
        }        

        $fields = array('Ator.id', 'Ator.nome');
        $order = array('Ator.nome' => 'asc');
        $ators = $this->AtorsFilme->Ator->find('list', compact('fields', 'order'));
        $this->set('ators', $ators);

        $fields = array('Filme.id', 'Filme.nome');
        $conditions = array('Filme.id' => $idFilme);
        $filmes = $this->AtorsFilme->Filme->find('first', compact('fields', 'conditions'));
        $this->set('filmes', $filmes);
    }

    public function delete($idAtor, $idFilme) {
        $this->AtorsFilme->delete($idAtor);
        $this->Flash->bootstrap('Excluido com sucesso', array('key' => 'warning'));
        $this->redirect('/filmes/view/' . $idFilme);
    }

}

?>