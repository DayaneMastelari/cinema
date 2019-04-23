<?php
class AtorTest extends CakeTestCase {

    public $fixtures = array('app.ator');
    public $Ator = null;

    public function setUp() {
        $this->Ator = ClassRegistry::init('Ator');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Ator, 'Ator'));
    }

    public function testNomeEmpty() {
        $data = array('Ator' => array('nome' => null));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

    public function testNomeMinLength() {
        $data = array('Ator' => array('nome' => 'ab'));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

    public function testNascimentoBlank() {
        $data = array('Ator' => array('nascimento' => null));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }

    public function testNascimentoDataInvalida() {
        $data = array('Ator' => array('nascimento' => '32/13/2019'));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);

        $data = array('Ator' => array('nascimento' => '2019/04/23'));
        $saved = $this->Ator->save($data);
        $this->assertFalse($saved);
    }


}
?>