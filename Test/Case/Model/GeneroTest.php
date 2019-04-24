<?php
class GeneroTest extends CakeTestCase {

    public $fixtures = array('app.genero');
    public $Genero = null;

    public function setUp() {
        $this->Genero = ClassRegistry::init('Genero');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Genero, 'Genero'));
    }

    public function testGeneroBlank() {
        $data = array('Genero' => array('nome' => null));
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);
    }

    public function testGeneroMinLength() {
        $data = array('Genero' => array('nome' => 'ab'));
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);
    }

    public function testGeneroIsUnique() {
        $data = array('Genero' => array('nome' => 'Aventura'));
        $saved = $this->Genero->save($data);
        $this->assertFalse($saved);
    }


}
?>