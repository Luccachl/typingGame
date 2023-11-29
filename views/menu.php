<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <title>Menu</title>
</head>
<body>
<?php session_start(); ?>
    <div class="container">
        <div id="menu">
            <ul>
                <div class="title">Jogo <br> de Digitação</div>

                <li class="option">
                    <a href="../views/game.html?id_U=<?php echo $_SESSION['id_U']; ?>" target="_self">
                        Jogar
                    </a>
                </li>
                </li>
                <li class="option">
                    <a href="../views/ligas.php?id_U=<?php echo $_SESSION['id_U']; ?>" target="_self">
                        Ligas
                    </a>
                </li>
                <li class="option">
                    <a href="../views/historico.php?id_U=<?php echo $_SESSION['id_U']; ?>" target="_self">
                        Pontuação/Histórico
                    </a>
                </li>

                <li class="option">
                    <a href="../views/index.html" target="_self">
                        Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
<script src="../script/menu.js"></script>
</html>