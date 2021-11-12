<?php
    include('../componentes/header.php');
    require ('../funcoes.php');

    // if (!isset($_SESSION["usuarioId"])) 
    // {
    //     header("location: ../login/index.php");
    // }

    #Recupera dados 
        
        $cod_pessoa = $_GET['cod_pessoa'];
        $resultadoID = listarPessoaId($conn, $cod_pessoa);
        $editarPessoa = mysqli_fetch_array($resultadoID);
    
?>

    <div class="container">
        <hr>
        <div class="card">
            <div class="card-header">
                <h2>Edição</h2>
            </div>
            <div class="card-body">
                <form method="post" action="../funcoes.php" >

                <input type="hidden" name="acao" value="editar" />

                <input type="hidden" name="usuarioId" value='<?= $editarPessoa["cod_pessoa"]?>'/>

                    <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome" value='<?= $editarPessoa["nome"]?>' required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome" value='<?= $editarPessoa["sobrenome"]?>' required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email" value='<?= $editarPessoa["email"]?>' required>
                    <br />
                    <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular" value='<?= $editarPessoa["celular"]?>' required>
                    <br />
                    <button class="btn btn-success">EDITAR</button>
                </form>
            </div>
        </div>
    </div>

 

<?php
    include('../componentes/footer.php');
?>