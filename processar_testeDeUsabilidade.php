<?php
// Configurações do banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "reservaensaio";

// Criando a conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário e aplica segurança
    $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
    $sexo = isset($_POST['sexo']) ? htmlspecialchars($_POST['sexo']) : '';
    $idade = isset($_POST['idade']) ? intval($_POST['idade']) : 0;
    $profissao = isset($_POST['profissao']) ? htmlspecialchars($_POST['profissao']) : '';
    $q1 = isset($_POST['q1']) ? intval($_POST['q1']) : 0;
    $obs_q1 = isset($_POST['obs_q1']) ? htmlspecialchars($_POST['obs_q1']) : null;
    $q2 = isset($_POST['q2']) ? intval($_POST['q2']) : 0;
    $obs_q2 = isset($_POST['obs_q2']) ? htmlspecialchars($_POST['obs_q2']) : null;
    $q3 = isset($_POST['q3']) ? intval($_POST['q3']) : 0;
    $obs_q3 = isset($_POST['obs_q3']) ? htmlspecialchars($_POST['obs_q3']) : null;
    $q4 = isset($_POST['q4']) ? intval($_POST['q4']) : 0;
    $obs_q4 = isset($_POST['obs_q4']) ? htmlspecialchars($_POST['obs_q4']) : null;
    $comentarios_gerais = isset($_POST['comentarios_gerais']) ? htmlspecialchars($_POST['comentarios_gerais']) : null;

    // Verifica se o campo de tempo de início foi enviado
    if (isset($_POST['inicio'])) {
        // Converte o tempo de início (em milissegundos) para float
        $inicio = floatval($_POST['inicio']);
        
        // Calcula o tempo gasto em segundos (subtraindo o tempo de início do tempo atual)
        $tempo_gasto = round((microtime(true) - $inicio), 2); // Tempo em segundos com 2 casas decimais

        // Converte o tempo em minutos e segundos
        $minutos = floor($tempo_gasto / 60); // Obtém os minutos
        $segundos = floor($tempo_gasto % 60); // Obtém os segundos restantes

        // Formata o tempo como mm:ss
        $tempoFormatado = sprintf("%02d:%02d", $minutos, $segundos); // Exemplo: "02:39"
    } else {
        $tempoFormatado = "00:00"; // Se o tempo de início não foi passado, define o tempo como 00:00
    }

    // Prepara a query para inserir no banco de dados
    $sql = "INSERT INTO questionario_usabilidade 
            (nome, sexo, idade, profissao, q1, obs_q1, q2, obs_q2, q3, obs_q3, q4, obs_q4, comentarios_gerais, data_hora, tempo_gasto)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)";

    // Prepara a declaração
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Faz o bind dos parâmetros
        $stmt->bind_param(
            "ssissssssssssi", // Tipos dos parâmetros: string, string, inteiro, string, inteiro, string, ...
            $nome,
            $sexo,
            $idade,
            $profissao,
            $q1,
            $obs_q1,
            $q2,
            $obs_q2,
            $q3,
            $obs_q3,
            $q4,
            $obs_q4,
            $comentarios_gerais,
            $tempoFormatado // O tempo formatado no formato mm:ss
        );

        // Executa a query e verifica se deu certo
        if ($stmt->execute()) {
            echo "Questionário realizado com sucesso! Obrigado por sua colaboração.";
        } else {
            echo "Erro ao inserir os dados: " . $stmt->error;
        }

        // Fecha a declaração
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
