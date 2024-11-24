<?php
namespace App;

class VerificacaoReserva {
    public function verificarStatus($nome, $email) {
        if (empty($nome) || empty($email)) {
            throw new \InvalidArgumentException("Nome ou e-mail não podem estar vazios.");
        }

        if ($nome === 'Jenni' && $email === 'jennimakita@gmail.com') {
            return [
                'status' => 'Confirmada',
                'pacote' => 'Pacote Premium'
            ];
        }

        return [
            'status' => 'Não encontrada'
        ];
    }
}
?>
