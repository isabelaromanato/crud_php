<?php

    session_start();
    require("conexao.php");

    switch ($_POST["acao"]) 
    {
        
        #FAZER LOGIN
        case 'login':

            $usuarioCadastrado= $_POST["txt_usuario"];
            $senhaCadastrado= $_POST["txt_senha"];
            
            realizarLogin($usuarioCadastrado, $senhaCadastrado, $conexao);
        
            break;
        
            #
        case 'sair':

            echo "você vai fazer logout";

            session_destroy();
            header("location: ./index.php");
            break;

        default:
            # code...
            break;
    }



    #FUNÇÃO PARA REALIZAR LOGIN

    function realizarLogin($usuario, $senha, $conn)
    {
        $sql = "SELECT * FROM tbl_login WHERE usuario = '$usuario'";

        $resultado = mysqli_query($conn, $sql);

        $informacoesUsuario = mysqli_fetch_array($resultado);

        if ((isset($informacoesUsuario["usuario"]) && $informacoesUsuario["usuario"] == $usuario) && (isset($informacoesUsuario["senha"]) && $informacoesUsuario["senha"] == $senha))
        {
            echo "LOGIN REALIZADO COM SUCESSO!";

            $_SESSION["codUsuario"] = $informacoesUsuario["codInformacoesLogin"];
            $_SESSION["usuario"] = $informacoesUsuario["usuario"];
            $_SESSION["cod"] = session_id();      

            header("location: ../index.php");
            exit;
        }

        else 
        {
            header("location: ./index.php");
        }
    }



?>