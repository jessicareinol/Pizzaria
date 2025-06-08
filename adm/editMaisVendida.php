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
    <title>La Bella Pizzaria - Editar Item Mais Vendido</title>
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

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    require './Conn.php';
    require './Vendida.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['editar'])) {
        if (!empty($_FILES['imagem']['name'])) {
            $formData['imagem'] = "img/" . $_FILES['imagem']['name'];
            move_uploaded_file($_FILES['imagem']['tmp_name'], $formData['imagem']);
        } else {
            $formData['imagem'] = $formData['imagem_atual'];
        }

        $edit = new Vendida();
        $edit->formData = $formData;
        $valor = $edit->edit();

        if ($valor) {
            $_SESSION['msg'] = "<div class='alert alert-success'>Registro editado com sucesso!</div>";
            header("Location: listMaisVendida.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Erro ao editar registro!</div>";
        }
    }

    if (!empty($id)) {
        $vendida = new Vendida();
        $vendida->id = $id;
        $row = $vendida->view();
        extract($row);
    ?>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-success text-white text-center">
                        <h2><i class="fas fa-star me-2"></i>Editar Item Mais Vendido</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <input type="hidden" name="imagem_atual" value="<?= $imagem; ?>">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto:</label>
                                <input type="text" id="nome" name="nome" class="form-control" value="<?= $nome; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição:</label>
                                <textarea id="descricao" name="descricao" class="form-control" rows="3" required><?= $descricao; ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="imagem" class="form-label">Nova Imagem (opcional):</label>
                                <input type="file" id="imagem" name="imagem" class="form-control">
                                <small class="text-muted">Imagem atual: <?= htmlspecialchars($imagem); ?></small>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" name="editar" value="editar" class="btn btn-success w-50">
                                    <i class="fas fa-check-circle me-1"></i> Salvar
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

    <?php 
    } else {
        $_SESSION['msg'] = "<div class='alert alert-warning'>Registro não encontrado!</div>";
        header("Location: listMaisVendida.php");
        exit;
    }
    ?>
</body>
</html>
