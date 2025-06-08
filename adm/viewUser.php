<?php
session_start();
ob_start();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bella Pizzaria - Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: #fffaf0;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 1rem;
        }
        .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
        label {
            font-weight: 600;
        }
    </style>
</head>
<body>
<?php include_once('header.php'); ?>

<div class="container py-5">
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    if (!empty($id)) {
        require './Conn.php';
        require './User.php';

        $view = new User();
        $view->id = $id;
        $user = $view->view();

        extract($user);
    ?>
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center">
                    <h2><i class="fas fa-user me-2"></i>Detalhes do Usuário</h2>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> <?= $nome; ?></p>
                    <p><strong>Email:</strong> <?= $email; ?></p>
                    <p><strong>Cadastrado em:</strong> <?= date('d/m/Y H:i:s', strtotime($created)); ?></p>
                    <p><strong>Última edição:</strong>
                        <?= !empty($modified) ? date('d/m/Y H:i:s', strtotime($modified)) : 'Nunca editado'; ?>
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="listUser.php" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Registro não encontrado!</div>";
        header('Location: listUser.php');
    }
    ?>
</div>
</body>
</html>
