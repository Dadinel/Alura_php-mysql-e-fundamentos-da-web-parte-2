<?php 
    include("cabecalho.php");
    include("conecta.php");
    include("banco-categoria.php");
    include("logica-usuario.php");
?>

<?php verificaUsuario(); ?>

<h1>Formulário de produto</h1>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
            <tr>
                <td>Nome:</td>
                <td><input class="form-control" type="text" name="nome"></td>
            </tr>
            <tr>
                <td>Preço:</td>
                <td><input class="form-control" type="number" name="preco"></td>
            </tr>
            <tr>
                <td>Descrição:</td>
                <td><textarea class="form-control" name="descricao"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="usado" value="false"> Usado</td>
            </tr>
            <tr>
                <td>Categoria</td>
                <td>
                    <select class="form-control" name="categoria_id">
                        <?php 
                            $categorias = listaCategorias($conexao);

                            foreach($categorias as $categoria): ?>
                                <option value="<?=$categoria['id'];?>"><?=$categoria['nome'];?>
                                </option>

                        <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="btn btn-primary" type="submit">Cadastrar</button>
                </td>
            </tr>
        </table>
    </form>

<?php include("rodape.php"); ?>