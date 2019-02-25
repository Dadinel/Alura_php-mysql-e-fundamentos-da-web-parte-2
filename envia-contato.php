<?php
    require_once("session-start.php");

    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $mensagem = $_POST["mensagem"];

    require_once("PHPMailerAutoload.php");

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;

    $mail->Username = "alura.php.e.mysql@gmail.com";
    $mail->Password = "123456";

    $mail->setFrom("alura.php.e.mysql@gmail.com", "Alura Curso PHP e MySQL");
    $mail->addAddress("alura.php.e.mysql@gmail.com");
    $mail->Subject = "Email de contato da loja";
    $mail->msgHTML("<html>de: {$nome}</br>e-mail: {$email}></br>mensagem: {$mensagem}</html>");
    $mail->AltBody = "de: {$nome}\ne-mail: {$email}>\nmensagem: {$mensagem}";
    //$mail->addAttachment(""); //Anexos

    if($mail->send()) {
        $_SESSION["success"] = "Mensagem enviada com sucesso";
        header("Location: index.php");
    }
    else {
        $_SESSION["danger"] = "Erro ao enviar mensagem: " . $mail->ErrorInfo;
        header("Location: contato.php");
    }

    die();
?>