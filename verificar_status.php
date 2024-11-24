<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservaensaio";

// Cria a conexão com MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Configuração da conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservaensaio";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Captura e sanitiza os dados do formulário
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);

// Verifica se o usuário existe na tabela 'usuario'
$sql_verifica_usuario = "SELECT id FROM usuario WHERE nome = ? AND email = ?";
$stmt_verifica_usuario = $conn->prepare($sql_verifica_usuario);
$stmt_verifica_usuario->bind_param("ss", $nome, $email);
$stmt_verifica_usuario->execute();
$stmt_verifica_usuario->store_result();

if ($stmt_verifica_usuario->num_rows === 0) {
    $_SESSION['error'] = "Erro: Não encontramos nenhuma reserva associada a esse nome e e-mail.";
    header("Location: reserva.php");
    exit;  // Certifique-se de que o script pare aqui
} else {
    $stmt_verifica_usuario->bind_result($usuario_id);
    $stmt_verifica_usuario->fetch();
}
$stmt_verifica_usuario->close();

// Consulta os detalhes da última reserva do usuário
$sql_verifica_reserva = "
    SELECT r.status, p.descricao, r.data, r.horario
    FROM reserva r
    JOIN pacote_ensaio p ON r.pacote_ensaio_id = p.id
    WHERE r.usuario_id = ?
    ORDER BY r.id DESC
    LIMIT 1
";
$stmt_verifica_reserva = $conn->prepare($sql_verifica_reserva);
$stmt_verifica_reserva->bind_param("i", $usuario_id);
$stmt_verifica_reserva->execute();
$stmt_verifica_reserva->store_result();

if ($stmt_verifica_reserva->num_rows === 0) {
    // Caso não exista reserva para o usuário
    $_SESSION['error'] = "Erro: Não há reservas registradas para este usuário.";
} else {
    $stmt_verifica_reserva->bind_result($status, $descricao_pacote, $data, $horario);
    $stmt_verifica_reserva->fetch();

    // Formata o horário para exibir apenas horas e minutos
    $horario_formatado = date("H:i", strtotime($horario));

    // Armazena os detalhes da reserva na sessão para exibição na página
    $_SESSION['status'] = " " . $status;
    $_SESSION['pacote'] = " " . $descricao_pacote;
    $_SESSION['data'] = " " . date("d/m/Y", strtotime($data));
    $_SESSION['horario'] = " " . $horario_formatado;
}

$stmt_verifica_reserva->close();
$conn->close();

// Redireciona de volta para a página de reserva
header("Location: reserva.php");
exit;  // Certifique-se de que o script pare aqui
?>
