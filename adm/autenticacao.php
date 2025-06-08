<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Bella Pizzaria</title>
</head>
<body>
<?php
    if (!empty($_POST) && (empty($_POST['email']) || empty($_POST['senha']))) {
        echo "<script>
            alert('Preencha todos os campos!');
            window.location.href = 'login.php';
        </script>";
        exit;
    } else {
        $email_escape = addslashes($_POST['email']);
        $senha_escape = addslashes($_POST['senha']);

        require './Conn.php';
        require './User.php';

        $user = new User();
        $row = $user->validaEmail($email_escape);

        if ($row) {
            $buscaUser = $user->loginDados($email_escape);
            extract($buscaUser);

            if (password_verify($senha_escape, $senha)) {
                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;
                $_SESSION['senha'] = $senha;
                header("Location: home.php");
                exit;
            } else {
                // senha incorreta
                echo "<script>
                    alert('Senha incorreta!');
                    window.location.href = 'login.php';
                </script>";
                exit;
            }
        } else {
            // e-mail não encontrado
            echo "<script>
                alert('E-mail não encontrado!');
                window.location.href = 'login.php';
            </script>";
            exit;
        }
    }
?>
</body>
</html>
