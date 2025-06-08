<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bella Pizzaria - Listar Itens Mais Vendidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('header.php');?>

    <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);//aqui eu limpo a variavel msg da session.
        }

        require './Conn.php';
        require './Vendida.php';

        $vendida = new Vendida();
        $result = $vendida->list();
    ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Pizzas Mais Vendidas</h4>
                </div>
                <div>
                    <a href="createMaisVendida.php" class="btn btn-outline-success btn-sm">Cadastrar</a>
                    <a href="home.php" class="btn btn-outline-secondary btn-sm">Voltar</a>
                </div>
            </div>
        </div>
        <hr>

        <span id="msgAlerta"></span>

        <div class="row">
            <div class="col-lg-12">
                <div class='table-responsive'>
                    <table class='table table-striped table-bordered'>
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Imagem</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($result as $item) {
                                    extract($item);
                            ?>
                            <tr>
                                <td><?php echo $nome;?></td>
                                <td><?php echo $descricao;?></td>
                                <td><img src="../<?php echo $imagem; ?>" alt="<?php echo $imagem; ?>" width="100"></td>
                                <td class="text-center">
                                    <a href="viewMaisVendida.php?id=<?php echo $id;?>" class='btn btn-outline-primary btn-sm'>Visualizar</a>
                                    <a href="editMaisVendida.php?id=<?php echo $id;?>" class='btn btn-outline-warning btn-sm'>Editar</a>
                                    <a href="javascript:void(0);" onclick="confirmaExclusaoMaisVendida(<?php echo $id;?>);" class='btn btn-outline-danger btn-sm'>Excluir</a>
                                </td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/funcao.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>