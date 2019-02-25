<?php
    require_once("session-start.php");

    function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }

    function verificaUsuario() {
        if(!usuarioEstaLogado()) {
            $_SESSION["danger"] = "Você não tem acessso a essa funcionalidade";
            header("Location: index.php?falhaDeSeguranca=true");
            die();
        }
    }

    function usuarioLogado() {
        return $_SESSION["usuario_logado"];
    }

    function logaUsuario($email) {
        //setcookie("usuario_logado", $email, time() + ( 60 * 15 ) ); //15 minutos para expirar o cookie
        $_SESSION["usuario_logado"] = $email;
    }

    function logout() {
        //unset($_SESSION["usuario_logado"]);
        session_destroy();
        session_start();
    }