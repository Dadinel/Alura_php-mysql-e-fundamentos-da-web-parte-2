<?php
    require_once("banco-usuario.php");
    require_once("logica-usuario.php");

    $usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);
    //var_dump($usuario); //Exibe no corpo do HTML o valor da variável

    if($usuario == null) {
        $_SESSION["danger"] = "Usuário ou senha inválido";
        header("Location: index.php?login=0");
    } else {
        $_SESSION["success"] = "Usuário logado com sucesso.";
        logaUsuario($usuario["email"]);
        header("Location: index.php");
    }

    die();
?>