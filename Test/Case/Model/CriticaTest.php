<?php
class CriticaTest extends CakeTestCase {

    public $fixtures = array('app.critica');
    public $Critica = null;

    public function setUp() {
        $this->Critica = ClassRegistry::init('Critica');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Critica, 'Critica'));
    }

    public function testNomeNotBlank() {
        $data = array('Critica' => array('nome' => null));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testNomeMinLength() {
        $data = array('Critica' => array('nome' => 'ac'));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testAvaliacaoNotBlanck() {
        $data = array('Critica' => array('avaliacao' => null));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testAvaliacaoRange() {
        $data = array('Critica' => array('avaliacao' => 6));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }

    public function testFilmeNotBlank() {
        $data = array('Critica' => array('filme_id' => null));
        $saved = $this->Critica->save($data);
        $this->assertFalse($saved);
    }


}
?>