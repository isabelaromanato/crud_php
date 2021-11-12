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

function listarPessoaId ($conn, $cod_pessoa)
    {
        
            $sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $cod_pessoa;";
        
            $resultado = mysqli_query($conn,$sql);
       
            return $resultado;
    }

// echo '<pre>';
// var_dump(listar($conn));
// echo '</pre>';


#SISTEMA PARA CADASTRAR PESSOAS 

    if (isset($_GET['acao'])) {
        $acao =  $_GET['acao'];
    }else {
        $acao =  $_POST['acao'];
    }
    
    switch ($acao) 
    {
        case 'cadastrar':

            // echo 'CADASTRAR';exit;


                $nome = $_POST["nome"];
                $sobrenome = $_POST["sobrenome"];
                $email = $_POST["email"];
                $celular = $_POST["celular"];

        
                    $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) VALUES ('$nome', '$sobrenome', '$email', '$celular');";

                    $resultadoDaEdicao = mysqli_query($conn, $sql);
                   
                    header("location: index.php");

            break;

               #SISTEMA PARA EDITAR PESSOAS 

            case 'editar' :

                //  echo 'EDITAR';exit;

                
                    $codPessoaComEdicao = $_POST['id'];
                    $nomePessoaComEdicao = $_POST['nome'];
                    $sobrenomePessoaComEdicao = $_POST['sobrenome'];
                    $emailPessoaComEdicao = $_POST['email'];
                    $celularlPessoaComEdicao = $_POST['celular'];

        
                    $sql = "UPDATE tbl_pessoa SET nome = '$nomePessoaComEdicao', sobrenome = '$sobrenomePessoaComEdicao', 
                    email = '$emailPessoaComEdicao', celular = '$celularlPessoaComEdicao' WHERE cod_pessoa = $codPessoaComEdicao;";
                   
                        $resultadoDaEdicao = mysqli_query($conn, $sql);
                        
                        header("location: index.php");

                break;

            #SISTEMA PARA DELETAR PESSOAS 

            case 'delete':

                // echo "'DELETE'"; exit;
                
                    $codPessoaExcluir = null;

                    if (isset($_POST["cod_pessoa"])) 
                    {$codPessoaExcluir = $_POST["cod_pessoa"];
                    }

                        $sql = "DELETE FROM tbl_pessoa WHERE (cod_pessoa = $codPessoaExcluir);";
                    
                        $resultadoExclusao = mysqli_query($conn, $sql);
                    
                        header("location: index.php");

                break;
        }
    