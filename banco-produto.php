<?php

    require_once("conecta.php");

function listaSoProdutos($conexao) {
    //$produtos = []; //Nova sintaxe
    $produtos = array();
    $resultado = mysqli_query($conexao, "select * from produtos");

    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $resultado;
}

function listaProdutos($conexao) {
    //$produtos = []; //Nova sintaxe
    $produtos = array();
    $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias c on p.categoria_id = c.id");

    while($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $resultado;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $query = "insert into produtos (nome,preco,descricao,categoria_id,usado) values ('{$nome}',{$preco},'{$descricao}',{$categoria_id},{$usado});";
    return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = '{$id}';";
    return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
    $nome = mysqli_real_escape_string($conexao, $nome);
    $descricao = mysqli_real_escape_string($conexao, $descricao);
    $query = "update produtos set nome='{$nome}', preco={$preco}, descricao='{$descricao}',categoria_id={$categoria_id}, usado={$usado} where id = {$id};";
    return mysqli_query($conexao, $query);
}

function buscaSoProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}

function buscaProduto($conexao, $id) {
    $query = "select p.*, c.nome as categoria_nome from produtos as p join categorias c on p.categoria_id = c.id where p.id = {$id}";
    $resultado = mysqli_query($conexao, $query);
    return mysqli_fetch_assoc($resultado);
}