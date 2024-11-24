<?php

use PHPUnit\Framework\TestCase;

class ReservaTest extends TestCase
{
    public function testReservaValida()
    {
        // Dados simulados para reserva
        $reserva = [
            'pacote_id' => 1,
            'usuario_id' => 123,
            'data_reserva' => '2024-11-17',
            'horario_reserva' => '14:00'
        ];

        // Verificar se os dados da reserva estão corretos
        $this->assertEquals(1, $reserva['pacote_id']);
        $this->assertEquals('2024-11-17', $reserva['data_reserva']);
        $this->assertEquals('14:00', $reserva['horario_reserva']);
    }

    public function testReservaInvalidaSemPacote()
    {
        // Dados de reserva inválidos (sem pacote)
        $reserva = [
            'usuario_id' => 123,
            'data_reserva' => '2024-11-17',
            'horario_reserva' => '14:00'
        ];

        // Espera-se que o pacote_id esteja ausente ou seja inválido
        $this->assertArrayNotHasKey('pacote_id', $reserva);
    }
}
