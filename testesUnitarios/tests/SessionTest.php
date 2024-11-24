<?php
// tests/SessionTest.php
//Testando a Lógica PHP com PHPUnit
//Testando a Sessão e Mensagens de Sucesso/Erro
//Primeiro, pode-se verificar se as variáveis de sessão estão configuradas corretamente.
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    public function setUp(): void
    {
        // Inicia a sessão para testar a manipulação
        session_start();
    }

    public function testSessionSuccessMessage()
    {
        $_SESSION['reserva_sucesso'] = "Reserva realizada com sucesso!";
        
        // Simula o comportamento de exibir a mensagem de sucesso
        $this->assertEquals("Reserva realizada com sucesso!", $_SESSION['reserva_sucesso']);
    }

    public function testSessionErrorMessage()
    {
        $_SESSION['error'] = "Erro ao realizar reserva!";
        
        // Simula o comportamento de exibir a mensagem de erro
        $this->assertEquals("Erro ao realizar reserva!", $_SESSION['error']);
    }

    public function tearDown(): void
    {
        // Limpa a sessão após o teste
        session_unset();
        session_destroy();
    }
}
?>

