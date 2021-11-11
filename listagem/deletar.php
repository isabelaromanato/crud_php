<?php

    require("./funcoes.php");

    $idFuncionario = $_GET["id"];

    deletarDados("./funcionarios.json", $idFuncionario);

    header("location:index.php");