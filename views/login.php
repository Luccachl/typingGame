<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">Login</h1>

                <form class="form-horizontal" method="POST" action="../php/check_login.php">
                    <div class="form-group">
                        <label for="inputUser" class="col-sm-2 control-label">Usuário</label>
                        <div class="col-sm-10">
                            <input required type="text" class="form-control" name="usuario" placeholder="Usuário">
                            <?php
                            session_start();
                            if (isset($_SESSION['login_error']) && $_SESSION['login_field'] === 'usuario') {
                                echo '<div class="text-danger">' . $_SESSION['login_error'] . '</div>';
                                unset($_SESSION['login_error']); 
                                unset($_SESSION['login_field']); 
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                        <div class="col-sm-10">
                            <input required type="password" class="form-control" name="senha" placeholder="Senha">
                            <?php
                            if (isset($_SESSION['login_error']) && $_SESSION['login_field'] === 'senha') {
                                echo '<div class="text-danger">' . $_SESSION['login_error'] . '</div>';
                                unset($_SESSION['login_error']);
                                unset($_SESSION['login_field']); 
                            }
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
