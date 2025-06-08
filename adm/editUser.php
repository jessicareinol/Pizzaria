<?php 
session_start();    
ob_start();
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La Bella Pizzaria - Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

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
            background-color: #198754; 
            color: white;
        }
        label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <?php include_once('header.php'); ?>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    require './Conn.php';
    require './User.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['editar'])) {
        $edit = new User();
        $edit->formData = $formData;
        $valor = $edit->edit();

        if ($valor) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Registro editado com sucesso!</div>";
            header("Location: listUser.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Erro ao editar registro!</div>";
        }
    }

    if (!empty($id)) {
        $user = new User();
        $user->id = $id;
        $row = $user->view();
        extract($row);
    ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2><i class="fas fa-user-edit me-2"></i>Editar Usuário</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" novalidate>
                            <input type="hidden" name="id" value="<?= $id; ?>">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome completo:</label>
                                <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($nome); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($email); ?>" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" name="editar" value="editar" class="btn btn-success w-50">
                                    <i class="fas fa-check-circle me-1"></i> Salvar
                                </button>
                                <a href="listUser.php" class="btn btn-outline-secondary w-25">
                                    <i class="fas fa-arrow-left me-1"></i> Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
    } else {
        $_SESSION['msg'] = "<div class='alert alert-warning'>Registro não encontrado!</div>";
        header("Location: listUser.php");
        exit;
    }
    ?>
</body>
</html>
