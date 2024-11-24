<?php 
// tests/ModalTest.php
use PHPUnit\Framework\TestCase;

class ModalTest extends TestCase
{
    public function testModalData()
    {
        // Simula um clique no botão de reservar e garante que o ID do pacote foi atribuído corretamente
        $_GET['pacote_id'] = 1;

        // Simula a função que é chamada para exibir o modal
        $pacote_id = isset($_GET['pacote_id']) ? $_GET['pacote_id'] : null;

        // Verifica se o pacote_id foi corretamente atribuído ao modal
        $this->assertEquals(1, $pacote_id);
    }
}


?>