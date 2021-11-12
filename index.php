<?php

session_start();

if (isset($_SESSION["idUsuario"])) 
{
    header('location: listagem/index.php');
}

else
{
    header("location: ./login/index.php");
}

?>