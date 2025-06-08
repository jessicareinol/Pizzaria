<?php 
session_start();    
ob_start();
require './Conn.php';
require './User.php';

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($formData['cadastrar'])) {
    $inserir = new User();
    $inserir->formData = $formData;
    $valor = $inserir->inserir();

    if ($valor) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Registro cadastrado com sucesso!</div>";
        header("Location: listUser.php");
        exit;
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Erro ao cadastrar!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La Bella Pizzaria - Cadastrar Usuário</title>
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
        }
        label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <?php include_once('header.php'); ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h2><i class="fas fa-user-plus me-2"></i>Cadastrar Usuário</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome completo:</label>
                                <input
                                    type="text"
                                    name="nome"
                                    id="nome"
                                    class="form-control"
                                    placeholder="Digite o nome"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control"
                                    placeholder="Digite o e-mail"
                                    required
                                />
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha de Acesso:</label>
                                <input
                                    type="password"
                                    name="senha"
                                    id="senha"
                                    class="form-control"
                                    placeholder="Digite a senha de acesso"
                                    minlength="8"
                                    maxlength="20"
                                    pattern=".{8,20}"
                                    title="A senha deve ter entre 8 e 20 caracteres."
                                    required
                                />
                                <small class="text-muted">Deve ter entre 8 e 20 caracteres.</small>
                                <div class="form-check mt-2">
                                    <input
                                        type="checkbox"
                                        class="form-check-input"
                                        id="showPassword"
                                    />
                                    <label class="form-check-label" for="showPassword">Mostrar senha</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success w-50">
                                    <i class="fas fa-check-circle me-1"></i> Cadastrar
                                </button>
                                <a href="home.php" class="btn btn-outline-secondary w-25">
                                    <i class="fas fa-arrow-left me-1"></i> Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('senha');

        showPasswordCheckbox.addEventListener('change', function () {
            passwordInput.type = this.checked ? 'text' : 'password';
        });
    </script>
</body>
</html>
