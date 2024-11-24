<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>
    <link rel="stylesheet" href="reserva.css">
    <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pV9N04mAFtBdo1VHCkUhSxtByE97a7nP1yTVLb5iwQESX7Wfi10IrYty7i2B+Pf7" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="imagens/Modern Leaf Photography Logo (2).png" alt="Logo" width="150" height="120">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pacotes.php">Pacotes</a>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reserva.php">Reserva</a>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sobreMim.html">Sobre Mim</a>  
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>

<main class="container my-5">
    <section>
        <h2 class="mb-4 text-center">Verificar Status da Reserva</h2>
        <form action="verificar_status.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="nome_status" class="form-label">Nome</label>
                <input type="text" id="nome_status" name="nome" class="form-control" placeholder="Digite seu nome" required>
            </div>
            <div class="col-md-6">
                <label for="email_status" class="form-label">E-mail</label>
                <input type="email" id="email_status" name="email" class="form-control" placeholder="Digite seu e-mail" required>
            </div>
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary">Verificar Status</button>
            </div>
        </form>
    </section>

    <?php if (isset($_SESSION['status_message']) || isset($_SESSION['error_message'])): ?>
        <div class="mt-4">
            <?php if (isset($_SESSION['status_message'])): ?>
                <div class="alert alert-success alert-dismissible fade show">
                    <?php echo $_SESSION['status_message']; unset($_SESSION['status_message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['status'])): ?>
        <section class="mt-5">
            <h2>Detalhes da Reserva</h2>
            <table class="table table-bordered mt-3">
                <tr>
                    <th>Status</th>
                    <td><?php echo $_SESSION['status']; ?></td>
                </tr>
                <tr>
                    <th>Pacote</th>
                    <td><?php echo $_SESSION['pacote']; ?></td>
                </tr>
                <tr>
                    <th>Data</th>
                    <td><?php echo $_SESSION['data']; ?></td>
                </tr>
                <tr>
                    <th>Horário</th>
                    <td><?php echo $_SESSION['horario']; ?></td>
                </tr>
            </table>
        </section>
        <?php
            unset($_SESSION['status'], $_SESSION['pacote'], $_SESSION['data'], $_SESSION['horario'], $_SESSION['reserva_id']);
        ?>
    <?php else: ?>
        <p class="mt-4">Nenhuma reserva encontrada. <a href="pacotes.php">Faça sua reserva aqui</a>.</p>
    <?php endif; ?>
</main>

<?php
    // Limpa as variáveis de sessão após exibir os detalhes
    unset($_SESSION['status']);
    unset($_SESSION['pacote']);
    unset($_SESSION['data']);
    unset($_SESSION['horario']);
    unset($_SESSION['reserva_id']);
?>

<div class="card text-center">
    <div class="card-header">
      Suporte
    </div>
    <div class="card-body">
      <h5 class="card-title">Em casos de cancelamento ou alterações nas reservas, entre em contato.</h5>
      <p class="card-text">E-mail: jennimakita@gmail.com</p>
      <p>Cel: +(81) 070-3549-6423</p>
      <h6>Redes Sociais</h6>
      <a href="https://www.instagram.com/jennimakita?igsh=a2VmZnFvcDdsMXpi&utm_source=qr" target="_blank"><img src="imagens/insta.png" alt=""></a>
      <a href="https://wa.me/8107035496423" target="_blank"><img src="imagens/whatsapp.png" alt=""></a>
      <hr>
    </div>
</div>

<footer class="footer">
    <p>&copy; 2024 Jenni Makita Photography. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
