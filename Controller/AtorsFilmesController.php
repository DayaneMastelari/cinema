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

        /*$fields = array('Filme.id', 'Filme.nome');
        $order = array('Filme.nome' => 'asc');
        $filmes = $this->AtorsFilme->Filme->find('list', compact('fields', 'order'));
        $this->set('filmes', $filmes);*/
    }

    public function delete($idAtor, $idFilme) {
        $this->AtorsFilme->delete($idAtor);
        $this->Flash->set('Excluido com sucesso');
        $this->redirect('/filmes/view/' . $idFilme);
    }

}

?>