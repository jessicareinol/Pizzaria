<?php
session_start();
ob_start();
require './Conn.php';
require './Vendida.php';

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($formData['cadastrar'])) {
    $formData['imagem'] = "img/" . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], $formData['imagem']);

    $vendida = new Vendida();
    $vendida->formData = $formData;
    $result = $vendida->inserir();

    if ($result) {
        $_SESSION['msg'] = "<div class='alert alert-success'>Item cadastrado com sucesso!</div>";
        header("Location: listMaisVendida.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar item!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La Bella Pizzaria - Cadastrar Item Mais Vendido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
                        <h2><i class="fas fa-chart-line me-2"></i>Cadastrar Item Mais Vendido</h2>
                    </div>
                    <div class="card-body">
                        <?php
                            if (isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data" novalidate>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <textarea name="descricao" id="descricao" class="form-control" rows="3" placeholder="Descreva o produto..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem do Produto:</label>
                                <input type="file" name="imagem" id="imagem" class="form-control" required />
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success w-50">
                                    <i class="fas fa-check-circle me-1"></i> Cadastrar
                                </button>
                                <a href="listMaisVendida.php" class="btn btn-outline-secondary w-25">
                                    <i class="fas fa-arrow-left me-1"></i> Voltar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
