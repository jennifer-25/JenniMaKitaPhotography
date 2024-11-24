<?php

use PHPUnit\Framework\TestCase;

class PacotesTest extends TestCase
{
    public function testPacoteArray()
    {
        // Dados de pacotes
        $pacotes = [
            ['id' => 1, 'nome' => 'Pacote: 18 Fotos', 'preco' => 'JP¥15.000', 'descricao' => 'Ensaio Externo, Interno, individual, casal, família, infantil. <hr> Obs:Máximo 4 pessoas, cada foto à mais ¥1.000Yen', 'imagem' => '33.jpg'],
            ['id' => 2, 'nome' => 'Pacote: 25 Fotos', 'preco' => 'JP¥20.000', 'descricao' => 'Ensaio Externo, Interno, individual, casal, família, infantil. <hr> Obs:Máximo 4 pessoas, cada foto à mais ¥1.000Yen.', 'imagem' => '34.jpg'],
            ['id' => 3, 'nome' => 'Pacote Festas, todas as fotos', 'preco' => 'JP¥20.000', 'descricao' => 'Festas de aniversário, bodas, chá de bebê, eventos. <hr> Obs: Cada hora à mais, terá adicionais, consultar!', 'imagem' => '32.jpg']
        ];

        // Verificar se a quantidade de pacotes é igual a 3
        $this->assertCount(3, $pacotes);

        // Verificar se o nome do primeiro pacote está correto
        $this->assertEquals('Pacote: 18 Fotos', $pacotes[0]['nome']);

        // Verificar se o preço do segundo pacote está correto
        $this->assertEquals('JP¥20.000', $pacotes[1]['preco']);
    }
}
