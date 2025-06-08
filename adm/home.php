<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La Bella Pizzaria - Administrativo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            background: #fff8f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .welcome-section {
            background: #ffe5b4;
            border-radius: 1rem;
            padding: 2.5rem 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 0 15px rgb(255 165 0 / 0.3);
            text-align: center;
        }
        .welcome-section h2 {
            font-weight: 700;
            color: #d35400;
            margin-bottom: 0.5rem;
        }
        .welcome-section p {
            font-size: 1.15rem;
            color: #5a3e1b;
            margin-bottom: 1.5rem;
        }
        .welcome-section img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #d35400;
            box-shadow: 0 0 15px rgb(211 84 0 / 0.5);
        }

        /* card */
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 16px rgb(0 0 0 / 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgb(0 0 0 / 0.2);
        }
        .card-header {
            background-color: #fdf2e9;
            font-weight: 700;
            font-size: 1.25rem;
            color: #d35400;
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
            text-align: center;
            padding: 1rem 1.5rem;
        }
        .card-body {
            padding: 1.5rem;
            color: #6c4b1a;
            text-align: center;
            font-size: 1rem;
        }
        .card-body p {
            margin-bottom: 1.25rem;
        }
        .card-body a.btn {
            width: 100%;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 0.75rem;
            padding: 0.6rem 0;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .btn-outline-success {
            color: #d35400;
            border-color: #d35400;
        }
        .btn-outline-success:hover {
            background-color: #d35400;
            color: white;
        }

        /* atalho */
        .shortcuts-section {
            margin-top: 4rem;
            text-align: center;
        }
        .shortcuts-section h2 {
            font-weight: 800;
            color: #d35400;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }
        .shortcuts-section p {
            color: #92793d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }
        .btn-lg {
            border-radius: 1rem !important;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgb(211 84 0 / 0.4);
            transition: box-shadow 0.3s ease;
        }
        .btn-lg:hover {
            box-shadow: 0 8px 20px rgb(211 84 0 / 0.7);
        }
        .gap-2 > i {
            font-size: 1.3rem;
        }

        /* footer */
        footer {
            margin-top: 4rem;
            padding: 1.5rem 0;
            color: #a1702a;
            font-weight: 600;
            font-size: 0.95rem;
        }

        /* deixar responsivo */
        @media (max-width: 576px) {
            .welcome-section img {
                width: 140px;
                height: 140px;
            }
            .card-body a.btn {
                font-size: 0.9rem;
                padding: 0.5rem 0;
            }
            .btn-lg {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

<?php include_once('header.php'); ?>

<div class="container">
    <section class="welcome-section">
        <h2>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
        <p>Aqui você pode administrar todo o sistema da La Bella Pizzaria.</p>
        <img src="../img/pizza.jpg" alt="Imagem de pizza deliciosa" />
    </section>

    <div class="row mt-5 g-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Gerenciamento do Cardápio</div>
                <div class="card-body">
                    <p>Adicione, edite ou delete itens do nosso cardápio.</p>
                    <a href="listCardapio.php" class="btn btn-outline-success">Gerenciar Cardápio</a>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Sabores Mais Vendidos</div>
                <div class="card-body">
                    <p>Aqui você pode definir as pizzas mais vendidas.</p>
                    <a href="listMaisVendida.php" class="btn btn-outline-success">Gerenciar Pizzas Mais Vendidas</a>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Gerenciamento de Usuários</div>
                <div class="card-body">
                    <p>Veja todos os usuários que estão cadastrados.</p>
                    <a href="listUser.php" class="btn btn-outline-success">Gerenciar Usuários</a>
                </div>
            </div>
        </div>
    </div>

    <section class="shortcuts-section">
        <h2>Opções de Atalhos</h2>
        <p>Escolha uma das opções abaixo para gerenciar o site de forma mais rápida.</p>
        <div class="row g-3 justify-content-center">
            <div class="col-md-4">
                <a href="createCardapio.php" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center gap-2">
                    <i class="fas fa-pizza-slice"></i> Adicionar Novo Sabor
                </a>
            </div>
            <div class="col-md-4">
                <a href="createMaisVendida.php" class="btn btn-success btn-lg d-flex align-items-center justify-content-center gap-2">
                    <i class="fas fa-star"></i> Adicionar Mais Vendida
                </a>
            </div>
            <div class="col-md-4">
                <a href="listUser.php" class="btn btn-warning btn-lg d-flex align-items-center justify-content-center gap-2">
                    <i class="fas fa-user-cog"></i> Gerenciar Usuários
                </a>
            </div>
        </div>
    </section>

    <footer class="text-center">
        <p>&copy; 2025 La Bella Pizzaria</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
