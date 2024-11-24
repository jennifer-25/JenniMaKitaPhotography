<?php
session_start(); // Inicia a sessão para mensagens

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservaensaio";

// Cria a conexão com MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $pacote_id = $_POST['pacote_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $data = $_POST['data'];
    $horario = date('H:i', strtotime($_POST['horario']));
    $local = $_POST['local'];
    $quantidade_pessoas = $_POST['pessoas'];
    $detalhes = $_POST['detalhes'];
    $concordaTermos = isset($_POST['concordaTermos']) ? true : false;
    $status = 'pendente'; // Definir status inicial como 'pendente'

    // Validação do número de celular (máximo 11 dígitos, apenas números)
    if (strlen($celular) > 11 || !ctype_digit($celular)) {
        $_SESSION['msg'] = "O celular não pode ter mais de 11 dígitos e deve conter apenas números.";
        header("Location: pacotes.php");
        exit;
    }

    // Verifica se o pacote existe usando o ID
    $sql_verifica_pacote = "SELECT id, descricao, valor FROM pacote_ensaio WHERE id = ?";
    $stmt_verifica = $conn->prepare($sql_verifica_pacote);
    $stmt_verifica->bind_param("i", $pacote_id);
    if ($stmt_verifica->execute()) {
        $stmt_verifica->store_result();

        if ($stmt_verifica->num_rows === 0) {
            $_SESSION['error'] = "Erro: O pacote com ID $pacote_id não existe.";
            header("Location: pacotes.php");
            exit;
        }

        // Recupera os detalhes do pacote
        $stmt_verifica->bind_result($pacote_id, $pacote_descricao, $pacote_valor);
        $stmt_verifica->fetch();
    } else {
        $_SESSION['error'] = "Erro ao verificar o pacote: " . $stmt_verifica->error;
        header("Location: pacotes.php");
        exit;
    }

    // Verifica duplicidade no email e no celular do usuário
    $sql_verifica_usuario = "SELECT id FROM usuario WHERE email = ? OR celular = ?";
    $stmt_verifica_usuario = $conn->prepare($sql_verifica_usuario);
    $stmt_verifica_usuario->bind_param("ss", $email, $celular);
    $stmt_verifica_usuario->execute();
    $stmt_verifica_usuario->store_result();

    if ($stmt_verifica_usuario->num_rows > 0) {
        // O usuário já existe, não permite a reserva
        $_SESSION['error'] = "Erro: Já existe um usuário com este e-mail ou celular.";
        header("Location: pacotes.php");
        exit;
    } else {
        // O usuário não existe, insere um novo
        $sql_usuario = "INSERT INTO usuario (nome, email, celular) VALUES (?, ?, ?)";
        $stmt_usuario = $conn->prepare($sql_usuario);
        $stmt_usuario->bind_param("sss", $nome, $email, $celular);

        if ($stmt_usuario->execute()) {
            $usuario_id = $stmt_usuario->insert_id;
        } else {
            $_SESSION['error'] = "Erro ao inserir o usuário: " . $stmt_usuario->error;
            header("Location: pacotes.php");
            exit;
        }
    }

    // Fecha a consulta de verificação de usuário
    $stmt_verifica_usuario->close();

    // Verifica duplicidade de data para o mesmo usuário
    $sql_verifica_reserva = "SELECT id FROM reserva WHERE data = ? AND usuario_id = ?";
    $stmt_verifica_reserva = $conn->prepare($sql_verifica_reserva);
    $stmt_verifica_reserva->bind_param("si", $data, $usuario_id);
    $stmt_verifica_reserva->execute();
    $stmt_verifica_reserva->store_result();

    if ($stmt_verifica_reserva->num_rows > 0) {
        // Já existe uma reserva para essa data e usuário
        $_SESSION['error'] = "Erro: Já existe uma reserva para essa data.";
        header("Location: pacotes.php");
        exit;
    }

    // Fecha a consulta de verificação de reserva
    $stmt_verifica_reserva->close();

    // Insere a concordância na tabela termo_contrato
    if ($concordaTermos) {
        $sql_termo_contrato = "INSERT INTO termo_contrato (concordaTermos) VALUES (TRUE)";
        $stmt_termo_contrato = $conn->prepare($sql_termo_contrato);
        $stmt_termo_contrato->execute();
        $termo_contrato_id = $stmt_termo_contrato->insert_id;
        $stmt_termo_contrato->close();
    } else {
        $termo_contrato_id = null; // Caso não concorde, podemos definir como NULL
    }

    // Insere a reserva no banco de dados, vinculando ao termo de contrato
    $sql_reserva = "INSERT INTO reserva (data, local, horario, quantidade_pessoas, detalhes, status, usuario_id, pacote_ensaio_id, termo_contrato_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_reserva = $conn->prepare($sql_reserva);
    $stmt_reserva->bind_param("sssissiii", $data, $local, $horario, $quantidade_pessoas, $detalhes, $status, $usuario_id, $pacote_id, $termo_contrato_id);

    if ($stmt_reserva->execute()) {
        // Se a reserva foi inserida com sucesso, define a variável de sessão
        $_SESSION['reserva_sucesso'] = "Reserva concluída com sucesso!";
    }

    // Fecha as consultas restantes e a conexão
    $stmt_reserva->close();
    $stmt_verifica->close();
    $conn->close();

    // Redireciona para a página anterior
    header("Location: pacotes.php");
    exit;
}
?>
