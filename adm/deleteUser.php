<?php
    session_start();
    ob_start();
    $id = $_GET['id'];

    if (!empty($id)) {
        require "./Conn.php";
        require "./User.php";
        $del = new User();
        $del->id = $id;
        $value = $del->delete();
        if ($value) {
            $_SESSION['msg'] = "<p style='color: red;'>
                Registro excluído com sucesso!</p>";    
                header('Location: listUser.php');
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>
                Erro: Registro não excluído!</p>";    
                header('Location: listUser.php');
        }   
    } else {
        $_SESSION['msg'] = "<p style='color: red;'>Erro: Registro não encontrado</p>";    
        header('Location: index.php');
    }
    