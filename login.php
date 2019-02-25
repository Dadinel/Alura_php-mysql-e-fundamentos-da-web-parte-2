<?php
    include("conecta.php");
    include("banco-usuario.php");
    include("logica-usuario.php");

    $usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
    //var_dump($usuario); //Exibe no corpo do HTML o valor da variável

    if($usuario == null) {
        header("Location: index.php?login=0");
    } else {
        setcookie("usuario_logado", $usuario["email"], time() + ( 60 * 15 ) ); //15 minutos para expirar o cookie
        logaUsuario($usuario["email"]);
        header("Location: index.php?login=1");
    }

    die();
?>