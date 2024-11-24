<?php
namespace App;  // Namespace correto

use PHPUnit\Framework\TestCase;
use App\VerificacaoReserva; // Certifique-se de que o uso está correto

class VerificacaoReservaTest extends TestCase
{
    public function testVerificarStatusComDadosValidos()
    {
        $verificacao = new VerificacaoReserva();
        $resultado = $verificacao->verificarStatus('Jenni', 'jennimakita@gmail.com');

        $this->assertArrayHasKey('status', $resultado);
        $this->assertEquals('Confirmada', $resultado['status']);
        $this->assertEquals('Pacote Premium', $resultado['pacote']);
    }

    public function testVerificarStatusComDadosInvalidos()
    {
        $verificacao = new VerificacaoReserva();
        $resultado = $verificacao->verificarStatus('Outro Nome', 'outroemail@gmail.com');

        $this->assertArrayHasKey('status', $resultado);
        $this->assertEquals('Não encontrada', $resultado['status']);
    }

    public function testVerificarStatusComDadosVazios()
    {
        $this->expectException(\InvalidArgumentException::class);

        $verificacao = new VerificacaoReserva();
        $verificacao->verificarStatus('', '');
    }
}


