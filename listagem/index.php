<?php
    include('../componentes/header.php');

    include('../conexao.php');
    include('../funcoes.php');

    

    // echo '<pre>';
    // var_dump(listar($conn));
    // echo '</pre>';



?>

<div class="container">

    <br/>
    
    <table class="table table-bordered">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>E-mail</th>
            <th>Celular</th>
            <th>Ações</th>
        </tr>
    </thead>


    <tbody>
    <?php
        $resultado = listar($conn);
        while ($dados = mysqli_fetch_array($resultado)) {
            # code...
        
        ?>
            <tr>
                <th><?php echo $dados["cod_pessoa"] ?></th>
                <th><?php echo $dados["nome"]?></th>
                <th><?php echo $dados["sobrenome"]?></th>
                <th><?php echo $dados["email"]?></th>
                <th><?php echo $dados["celular"]?></th>
                <th>
                

                <button  class="btn btn-warning"><a href="../cadastro/editar.php?cod_pessoa=<?php echo $dados ["cod_pessoa"]?>">EDITAR</a></button> 
              
                <button  class="btn btn-danger"><a href="funcoes.php/cod_pessoa=<?php  echo $dados ["cod_pessoa"]."&acoes=delete"?>">EXCLUIR</a></button>
                
                

                
                    <!-- <button  class="btn btn-warning">Editar</button> --> 

                     <!-- <form action="" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="">
                        <button class="btn btn-danger">Excluir</button>
                    </form>  -->
                    
                </th>
            </tr>
            <?php } ?>
    </tbody>

    </table>

</div>

<?php
    include('../componentes/footer.php');
?>