<?php

    session_start();

    function usuarioEstaLogado() {
        return isset($_SESSION["usuario_logado"]);
    }

    function verificaUsuario() {
        if(!usuarioEstaLogado()) {
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
    }