<?php 
    include("cabecalho.php");
    include("conecta.php");
    include("banco-produto.php");
?>

    <?php 
        $id = $_POST["id"];

        if(removeProduto($conexao, $id)) { ?>
            <p class="text-success">Produto <?=$id;?> removido!</p>
            <?php
                header("Location: produto-lista.php?removido=true");
                die();
            ?>

        <?php } else { 
            $msg = mysqli_error($conexao);
        ?>
            <p class="text-danger">Produto <?=$id;?> não pode ser removido: <?=$msg;?></p>
    <?php } ?>


<?php include("rodape.php"); ?>