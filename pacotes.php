<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacotes</title>
    <link rel="stylesheet" href="pacotes.css">
    <link rel="shortcut icon" href="imagens/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <!-- Botão para expandir menu -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <!-- Menu Offcanvas -->
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

    <img src="imagens/Capa para canal de youtube feminino e delicado em tons de bege.png" alt="foto capa" width="100%" height="700px">

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="imagens/33.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pacote: 18 Fotos <hr>JP¥15.000</h5>
                    <p class="card-text">Ensaio Externo, Interno, individual, casal, família, infantil.
                    <hr>   
                    Obs:Máximo 4 pessoas, cada foto à mais ¥1.000Yen</p>
                    <a href="#" data-pacote-id="1" class="btn btn-primary btn-reservar">Reservar</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="imagens/34.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pacote: 25 Fotos <hr>JP¥20.000</h5>
                    <p class="card-text">Ensaio Externo, Interno, individual, casal, família, infantil.
                        <hr>   
                        Obs:Máximo 4 pessoas, cada foto à mais ¥1.000Yen.</p>
                    <a href="#" data-pacote-id="2" class="btn btn-primary btn-reservar">Reservar</a>
                </div>
            </div>
        </div>
          
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="imagens/32.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Pacote Festas, todas as fotos.
                    <hr>
                    Duração: 2h
                    <hr>
                    JP¥20.000
                    </h5>
                    <p class="card-text">Festas de aniversário, boldas, chá de bebê, eventos.
                    <hr>
                    Obs: Cada hora à mais, terá adicionais, consultar!
                     </p>
                    <a href="#" data-pacote-id="3" class="btn btn-primary btn-reservar">Reservar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center">
        <div class="card-header">
          Suporte
        </div>
        <div class="card-body">
          <h5 class="card-title">Duvidas ou problemas, entre em contato.</h5>
          <p class="card-text">E-mail: jennimakita@gmail.com
            <p>Cel: +(81) 070-3549-6423</p>
          </p>
          <h6>Redes Sociais</h6>
            <a href="https://www.instagram.com/jennimakita?igsh=a2VmZnFvcDdsMXpi&utm_source=qr" target="_blank"><img src="imagens/insta.png" alt=""></a>
            <a href="https://wa.me/8107035496423" target="_blank"><img src="imagens/whatsapp.png" alt=""></a>
            <hr>
        </div>
        <div class="card-footer text-body-secondary">
        </div>
    </div>

        <!-- Modal de Reserva -->
        <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="form-container">
                <h2>Formulário de Reserva</h2>
                <form id="cadastroForm" action="processar_formulario.php" method="POST">
                    <input type="hidden" id="pacote_id" name="pacote_id" value="">

                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="data">Data:</label>
                    <input type="date" id="data" name="data" required>

                    <label for="horario">Horário:</label>
                    <input type="time" id="horario" name="horario" required>

                    <label for="celular">Celular:</label>
                    <input type="text" id="celular" name="celular" required>

                    <label for="local">Local do Ensaio:</label>
                    <input type="text" id="local" name="local">

                    <label for="pessoas">Quantidade de Pessoas:</label>
                    <input type="number" id="pessoas" name="pessoas" min="1" required>

                    <label for="detalhes">Conte-nos mais detalhes:</label>
                    <textarea id="detalhes" name="detalhes" rows="4"></textarea>

                    <input type="checkbox" id="concordaTermos" name="concordaTermos" required>
                    <label for="concordaTermos">
                        <a href="javascript:void(0);" onclick="openTermsModal()">Leia os termos aqui</a> Concordo com os termos de contratação de serviço
                    </label>

                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    
     

    <div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeTermsModal()">&times;</span>
            <h2>Termos e Condições do Contrato de Reserva</h2>
            <p><strong>Imprevistos e Reagendamentos:</strong> Em caso de imprevistos naturais, acidentes ou falecimento, o ensaio será automaticamente desmarcado e reagendado conforme a disponibilidade do fotógrafo e do cliente, sem custos adicionais.</p>
            <p><strong>Cancelamento por Parte do Cliente:</strong> O cliente poderá cancelar sua reserva até uma semana antes da data marcada sem qualquer penalidade. Caso o cancelamento ocorra com menos de uma semana de antecedência, será cobrada uma taxa de 30% do valor do ensaio.</p>
            <p><strong>Alteração da Data de Reserva:</strong> O cliente poderá cancelar sua reserva até uma semana antes da data marcada sem qualquer horário. Caso o cancelamento ocorra com menos de uma semana de antecedência, será cobrada uma multa de 5 mil ienes, esse valor deve ser depositado com antecedência, caso cancele dentro do prazo o valor será reenbolsado.</p>
            <p><strong>Custos de Deslocamento:</strong> O cliente está ciente de que poderá haver custos adicionais de viagem, caso o local escolhido para o ensaio ou evento seja distante ou envolva despesas de transporte, alimentação ou hospedagem.</p>
            <p><strong>Dados Pessoais:</strong> O cliente compreende e concorda que, para realizar a reserva, será necessário fornecer alguns dados pessoais, como nome, telefone e e-mail, que serão utilizados exclusivamente para fins de contato e gestão do agendamento. Garantimos que esses dados não serão compartilhados com terceiros ou utilizados para outros fins que não os especificados neste contrato.</p>
            <p><strong>Advertência sobre a Lei 9.610/98 - Direitos Autorais</strong>A Lei nº 9.610/98 protege os direitos autorais no Brasil. A reprodução ou uso não autorizado de obras intelectuais pode resultar em sanções civis e penais. Ao utilizar imagens ou materiais protegidos, é necessário obter permissão ou dar os devidos créditos ao autor. O uso indevido pode levar a penalidades, incluindo indenização por danos materiais e morais.</p>
            <p>Ao prosseguir com a reserva, o cliente declara estar de acordo com os termos descritos acima e compromete-se a respeitar as condições estabelecidas.</p>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Jennifer Makita. Todos os direitos reservados.</p>
            
        </div>    
    </footer>

    
    <script>
        // Funções para abrir e fechar o modal dos termos
        function openTermsModal() {
            document.getElementById("termsModal").style.display = "flex";
        }
    
        function closeTermsModal() {
            document.getElementById("termsModal").style.display = "none";
        }
    
        // Fechar o modal dos termos ao clicar fora do conteúdo
        window.onclick = function(event) {
            var termsModal = document.getElementById("termsModal");
            if (event.target === termsModal) {
                termsModal.style.display = "none";
            }
        };
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById('modal');
            var closeBtn = modal.querySelector('.close');
            var pacoteField = document.getElementById('pacote_id');
            var botoesReservar = document.querySelectorAll('.btn-reservar');

            botoesReservar.forEach(function(botao) {
                botao.addEventListener('click', function(event) {
                    event.preventDefault();
                    // Pega o ID do pacote e atribui ao campo oculto
                    var pacoteId = this.getAttribute('data-pacote-id');
                    pacoteField.value = pacoteId; // Define o ID do pacote no campo oculto
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });

            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            });

            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });
        });
    </script>

<?php
if (isset($_SESSION['reserva_sucesso'])) {
    echo "<script>alert('" . $_SESSION['reserva_sucesso'] . "');</script>";
    unset($_SESSION['reserva_sucesso']);
}
if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}
?>


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 