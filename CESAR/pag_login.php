<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tela de Login</title>
    </head>
    <body>
        <form method="POST">
            Usuário:<input type="text" name="txtu"><br>
            Senha:<input type="text" name="txts"><br>
            <input type="submit" value="Logar"><br>
        </form>
        <?php
            include("conexao.php");
            include("banco-usuario.php");
            if ($_POST) {
                $user = $_POST['txtu'];
                $senha = $_POST['txts'];                
                if(efetuarLogin($conexao, $user, $senha)){
                    session_start();
                    $_SESSION['nome'] = $user;
                    $_SESSION['log'] = 'ativo';
                    header("location: pag_menu.php");
                    die();
                }else{
                    echo 'Usuario ou senha incorreto';
                }
            }
        ?>
    </body>
</html>