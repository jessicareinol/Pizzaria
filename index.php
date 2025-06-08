<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>La Bella Pizzaria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="./css/style.css">
  <style>
    .card-img-top {
      height: 220px;
      object-fit: cover;
    }

    .banner {
      background: linear-gradient(10deg, #2f855a, #48bb78);
      color: white;
      padding: 4rem 2rem;
      border-radius: 0 0 40px 40px;
      text-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
    }

    .banner h1 {
      font-weight: 700;
      font-size: 2.8rem;
      margin-bottom: 0.5rem;
    }

    .btn-banner {
      background-color:rgb(242, 165, 11);
      border: none;
      font-weight: 600;
      padding: 0.8rem 2rem;
      box-shadow: 0 4px 10px rgba(214, 158, 46, 0.5);
      transition: background-color 0.3s ease;
    }

    .btn-banner:hover {
      background-color:rgb(227, 160, 35);
      color: white;
    }

    .card-title {
      font-weight: 600;
      color: #2f855a;
    }

    .card-text {
      color: #555;
      font-size: 0.95rem;
      min-height: 60px;
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
      <a class="navbar-brand fw-bold" href="#">La Bella Pizzaria</a>
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

  <header class="banner text-center">
    <h1>Bem-vindo à La Bella Pizzaria</h1>
    <p class="lead mb-4">Descubra os sabores mais irresistíveis em nosso cardápio!</p>
    <a href="adm/listCardapio2.php" class="btn btn-banner btn-lg">Ver Cardápio</a>
  </header>

  <?php
  require 'adm/Conn.php';
  require 'adm/Vendida.php';

  $vendida = new Vendida();
  $itens = $vendida->list();
  ?>

  <main class="container my-5">
    <h2 class="text-center text-success mb-5 fw-bold">As Pizzas Mais Vendidas</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php foreach ($itens as $item): ?>
      <div class="col">
        <div class="card shadow-sm h-100">
          <img src="<?= htmlspecialchars($item['imagem']); ?>" class="card-img-top" alt="<?= htmlspecialchars($item['nome']); ?>" />
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($item['nome']); ?></h5>
            <p class="card-text"><?= htmlspecialchars($item['descricao']); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>

  <footer class="text-center py-3">
    <p class="mb-0">© 2025 La Bella Pizza. Todos os direitos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
