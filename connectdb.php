<?php

function estabelerConexao()
{
    
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databasename = "projeto_cinema";

    try {
  
        $conexao = new PDO("mysql:host=$hostname;dbname=$databasename;charset=utf8mb4", $username, $password);
    } catch (\PDOException $e) {

        echo $e->getMessage();
    }

    return $conexao;
}

function getCategorias()
{
   
    $conexao = estabelerConexao();
    
    $stmt = $conexao->query('SELECT nome FROM categorias');
    $destinos = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $destinos;
}

function getCategoryIdByName($categoria) {
    
    $conexao = estabelerConexao();

    $stmt = $conexao->prepare('SELECT id FROM categorias WHERE nome = :categoryName');
    $stmt->bindParam(':categoryName', $categoria);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row ? $row['id'] : null;
}

function getUserByLogin($username, $password){

    
    $conexao = estabelerConexao();

    $stmt = $conexao->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}

//function getCategorias()
//{
    //$conexao = estabelerConexao();
    //$stmt = $conexao->query('SELECT id, nome FROM categorias');
    //$categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //return $categorias;
//}

function getFilmesByCategoria($categoria)
{
    $conexao = estabelerConexao();

    // Obtém o ID da categoria pelo nome usando a função getCategoryIdByName()
    $categoria_id = getCategoryIdByName($categoria);

    // Se o ID da categoria existir, busca os filmes
    if ($categoria_id) {
        $stmt = $conexao->prepare('SELECT * FROM filmes WHERE id_categorias = :categoria_id ORDER BY id DESC LIMIT 3');
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();
        $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $filmes;
    } else {
        return array(); // Retorna um array vazio se a categoria não for encontrada
    }
}


function getFilmesByCategoriaAll($categoria)
{
    $conexao = estabelerConexao();

    // Obtém o ID da categoria pelo nome usando a função getCategoryIdByName()
    $categoria_id = getCategoryIdByName($categoria);

    // Se o ID da categoria existir, busca os filmes
    if ($categoria_id) {
        $stmt = $conexao->prepare('SELECT * FROM filmes WHERE id_categorias = :categoria_id');
        $stmt->bindParam(':categoria_id', $categoria_id);
        $stmt->execute();
        $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $filmes;
    } else {
        return array(); // Retorna um array vazio se a categoria não for encontrada
    }
}