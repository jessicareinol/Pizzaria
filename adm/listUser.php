<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bella Pizzaria</title>
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
        require './User.php';

        $list = new User();
        $result = $list->list();
    ?>
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4>Listar Administradores</h4>
                </div>
                <div>
                    <a href="createUser.php" class="btn btn-outline-success btn-sm">Cadastrar</a>
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
                                <th>E-mail</th>
                                <th>Data do Cadastro</th>
                                <th>Última Atualização</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($result as $linha) {
                                    extract($linha);
                            ?>
                            <tr>
                                <td><?php echo $nome;?></td>
                                <td><?php echo $email;?></td>
                                <td>
                                    <?php 
                                        $dataF = new DateTime($created);
                                        $dataFormatada = $dataF->format('d/m/Y H:i:s');
                                        echo $dataFormatada;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        if (!empty($modified)) {
                                            $dataF = new DateTime($modified);
                                            $dataFormatada = $dataF->format('d/m/Y H:i:s');
                                            echo $dataFormatada;
                                        }
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="viewUser.php?id=<?php echo $id;?>" class='btn btn-outline-primary btn-sm'>Visualizar</a>
                                    <a href="editUser.php?id=<?php echo $id;?>" class='btn btn-outline-warning btn-sm'>Editar</a>
                                    <a href="javascript:void(0);" onclick="confirmaExclusaoUser(<?php echo $id;?>);" class='btn btn-outline-danger btn-sm'>Excluir</a>
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
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>