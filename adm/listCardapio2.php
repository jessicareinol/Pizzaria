<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La Bella Pizzaria - Cardápio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        footer {
        background-color: #1a202c;
        color: #a0aec0;
        font-size: 0.9rem;
        letter-spacing: 0.05em;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="../index.php">La Bella Pizzaria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav gap-2">
          <li class="nav-item">
            <a class="nav-link active fw-semibold" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="adm/listCardapio2.php">Ver Cardápio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold" href="adm/login.php">Logar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<?php
if (isset($_SESSION['msg'])) {
    echo '<div class="alert alert-info text-center mt-3">'.$_SESSION['msg'].'</div>';
    unset($_SESSION['msg']);
}

require './Conn.php';
require './Cardapio.php';

$cardapio = new Cardapio();
$result = $cardapio->list();
?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4>Bem vindo ao nosso cardápio!</h4>
            <p>Descubra nossas deliciosas opções e escolha o que mais combina com o seu paladar. Temos pizzas para todos os gostos!</p>
        </div>
        <a href="../index.php" class="btn btn-outline-secondary btn-sm">Voltar</a>
    </div>

    <div class="row g-4">
        <?php foreach ($result as $item): ?>
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm">
                    <img src="../<?php echo htmlspecialchars($item['imagem']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['nome']); ?>" />
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($item['nome']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($item['descricao']); ?></p>
                    </div>
                    <div class="card-footer text-center fw-bold text-success">
                        R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="text-center py-3" name>
    <p class="mb-0">© 2025 La Bella Pizza. Todos os direitos reservados.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
