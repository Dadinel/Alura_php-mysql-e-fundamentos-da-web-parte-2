<?php
    include("conecta.php");
    include("banco-usuario.php");

    $usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
    //var_dump($usuario); //Exibe no corpo do HTML o valor da variável

    if($usuario == null) {
        header("Location: index.php?login=0");
    } else {
        header("Location: index.php?login=1");
    }

    die();
?>