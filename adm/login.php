<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>La Bella Pizzaria</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-info">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header text-center bg-success text-white"><h4>La Bella Pizzaria - Administrativo</h4></div>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block" style="text-align:center; padding: 20pt 20pt 20pt 20pt;">
                                <img class="img-profile rounded-circle" src="../img/pizza.jpg" width="370pt" height="370pt">
                            </div>

                            <div class="col-lg-7">
                                <div class="p-3">
                                    <form method="post" action="autenticacao.php" autocomplete="off">
                                        <div class="form-group">
                                            <label for="email">Email de acesso:</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="codigo">Senha:</label>
                                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" id="inputPassword6" aria-describedby="passwordHelpInline" required>
                                            <small id="passwordHelpInline" class="text-muted">Deve ter entre 8 e 20 caracteres.</small>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" value="" id="showPassword">
                                            <label class="form-check-label" for="showPassword">Mostrar senha</label>
                                        </div>

                                        <div class="col-sm-12 mb-3">
                                            <button type="submit" class="btn btn-success btn-block">Login</button>
                                        </div>

                                        <div class="col-sm-12 mb-3">
                                            <a href="../" class="btn btn-success btn-block">Voltar</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/funcao.js"></script>
    <script>
        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('senha');

        showPasswordCheckbox.addEventListener('change', function() {
            const isChecked = this.checked;
            if (isChecked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>
    
</body>
</html>