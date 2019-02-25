<?php 
    require_once("cabecalho.php");
    require_once("banco-produto.php");
    require_once("logica-usuario.php");

    verificaUsuario();
?>

    <?php 
        $id = $_POST["id"];

        if(removeProduto($conexao, $id)) { ?>
            <p class="text-success">Produto <?=$id;?> removido!</p>
            <?php
                $_SESSION["success"] = "Produto removido com sucesso.";
                header("Location: produto-lista.php");
                die();
            ?>

        <?php } else { 
            $msg = mysqli_error($conexao);
        ?>
            <p class="text-danger">Produto <?=$id;?> não pode ser removido: <?=$msg;?></p>
    <?php } ?>


<?php require_once("rodape.php"); ?>