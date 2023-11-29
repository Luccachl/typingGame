<?php
  require("../php/check_form.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="../script/check_form.js"></script>
  <link rel="stylesheet" href="../css/register.css" >
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1 class="page-header">Registro</h1>

      <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if (!$erro): ?>
          <div class="alert alert-sucess">
            Conta registrada com sucesso
          </div>
          </div>
          <?php header("Location: login.php"); ?>
          <?php exit(); ?>

        <?php endif; ?>
      <?php endif; ?>

      <form enctype="multipart/form-data" id="form-test" class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="form-group <?php if(!empty($erro_nome)){echo "has-error";}?>">
          <label for="inputNome" class="col-sm-2 control-label">Nome</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome; ?>">
            <div id="erro-nome">
            </div>
            <?php if (!empty($erro_nome)): ?>
              <span class="help-block"><?php echo $erro_nome ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_email)){echo "has-error";}?>">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <div id="erro-email">
            </div>
            <?php if (!empty($erro_email)): ?>
              <span class="help-block"><?php echo $erro_email ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_user)){echo "has-error";}?>">
          <label for="inputUser" class="col-sm-2 control-label">Usuário</label>
          <div class="col-sm-10">
            <input required type="text" class="form-control" name="user" placeholder="Usuário" value="<?php echo $user; ?>">
            <div id="erro-user">
            </div>
            <?php if (!empty($erro_user)): ?>
              <span class="help-block"><?php echo $erro_user ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_senha)){echo "has-error";}?>">
          <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $senha; ?>">
            <div id="erro-senha">
            </div>
            <?php if (!empty($erro_senha)): ?>
              <span class="help-block"><?php echo $erro_senha ?></span>
            <?php endIf; ?>
          </div>
        </div>

        <div class="form-group <?php if(!empty($erro_senhaconf)){echo "has-error";}?>">
          <label for="inputSenhaconf" class="col-sm-2 control-label">Confirmação da senha</label>
          <div class="col-sm-10">
            <input required type="password" class="form-control" name="senhaconf" placeholder="Confirmação da senha" value="<?php echo $senhaconf; ?>">
            <div id="erro-senhaconf">
            </div>
            <?php if (!empty($erro_senhaconf)): ?>
              <span class="help-block"><?php echo $erro_senhaconf ?></span>
            <?php endIf; ?>
          </div>
            </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Enviar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
