<?php
class FilmeTest extends CakeTestCase {

    public $fixtures = array('app.filme');
    public $Filme = null;

    public function setUp() {
        $this->Filme = ClassRegistry::init('Filme');
    }

    public function testExisteModel() {
        $this->assertTrue(is_a($this->Filme, 'Filme'));
    }

    public function testNomeEmpty() {
        /** preparacao */
        $data = array('Filme' => array('nome' => null));
       
        /** execucao */
        $saved = $this->Filme->save($data);
        
        /** checagem / teste */
        $this->assertFalse($saved);
    }

    public function testDuracaoEmpty() {
        $data = array('Filme' => array('duracao' => null));
        $saved = $this->Filme->save($data);
        $this->assertFalse($saved);
    }

    public function testAnoValido() {
        $data = array('Filme' => array('ano' => null));
        $saved = $this->Filme->save($data);
        $this->assertFalse($saved);

        $data = array('Filme' => array('ano' => 32-20-2017));
        $saved = $this->Filme->save($data);
        $this->assertFalse($saved);

        $data = array('Filme' => array('ano' => 2017-10-10));
        $saved = $this->Filme->save($data);
        $this->assertFalse($saved);
    }


}
?>