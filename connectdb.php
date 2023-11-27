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
