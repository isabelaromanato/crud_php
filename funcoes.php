<?php


//IMPORTAÇÃO DO ARQUIVO DE CONEXÃO

include("conexao.php");

#FUNÇÃO DE LISTAGEM#

function listar($conn){

    $sql = "SELECT * FROM tbl_pessoa";

    $resultado = mysqli_query($conn, $sql);

    return $resultado;

}

function listarPessoa($conn){

    $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa VALUES" ;

    $resultado = mysqli_query($conn, $sql);

    return $resultado;

}

// echo '<pre>';
// var_dump(listar($conn));
// echo '</pre>';

# FUNÇÃO DE  DE EXCLUSÃO #

function delete($cod_pessoa, $conn ){

    $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa";

    $resultado = mysqli_query($conn, $sql);

 }
