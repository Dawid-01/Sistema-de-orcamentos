<?php
include('conexao.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Produtos</title>


<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>



</head>


<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="painel_funcionario.php"><big><big><i class="fa fa-arrow-left"></i></big></big></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    <form class="form-inline my-2 my-lg-0 mr-5">
      <input name="txtpesquisarcpf" id="txtcpf" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Código" aria-label="Pesquisar">
      <button name="buttonPesquisarCPF" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>

    <form class="form-inline my-2 my-lg-0">
      <input name="txtpesquisar" class="form-control mr-sm-2" type="search" placeholder="Buscar pelo Nome" aria-label="Pesquisar">
      <button name="buttonPesquisar" class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>





<div class="container">


    

      <br>


         <div class="row">
           <div class="col-sm-12">
            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalExemplo">Inserir Novo </button>

           </div>

          
        </div>


          <div class="content">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"> Tabela de Produtos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <!--LISTAR TODOS OS PRODUTOS -->

                      <?php


                        if(isset($_GET['buttonPesquisar']) and $_GET['txtpesquisar'] != ''){
                          $nome = $_GET['txtpesquisar'] . '%';
                           $query = "select * from produtos where nome LIKE '$nome'  order by nome asc"; 
                        }else if(isset($_GET['buttonPesquisarcodigo']) and $_GET['txtpesquisarcodigo'] != ''){
                          $nome = $_GET['txtpesquisarcodigos'];
                           $query = "select * from produtos where codigos = '$nome'  order by nome asc"; 
                        }

                        else{ 
                         $query = "select * from produtos order by nome asc"; 
                        }


                      
                        

                        $result = mysqli_query($conexao, $query);
                        //$dado = mysqli_fetch_array($result);
                        $row = mysqli_num_rows($result);

                        if($row == ''){

                            echo "<h3> Não existem dados cadastrados no banco </h3>";

                        }else{

                           ?>

                          

                      <table class="table">
                        <thead class=" text-primary">
                          
                          <th>
                            Nome
                          </th>
                          <th>
                            Código
                          </th>
                          <th>
                            Descrição
                          </th>
                           <th>
                            Cor 
                          </th>
                            <th>
                            Fornecedor
                          </th>
                           </th>
                            <th>
                            Data
                          </th>
                           </th>
                            <th>
                            Ações
                          </th>
                        </thead>
                        <tbody>
                         
                         <?php 

                          while($res_1 = mysqli_fetch_array($result)){
                            $nome = $res_1["nome"];
                            $codigo = $res_1["codigo"];
                            $descricao = $res_1["descricao"];
                            $cor = $res_1["cor"];
                            $fornecedor = $res_1["fornecedor"];
                            $data = $res_1["data"];
                            $id = $res_1["id"];

                            $data2 = implode('/', array_reverse(explode('-', $data)));

                            ?>

                            <tr>

                             <td><?php echo $nome; ?></td> 
                             <td><?php echo $codigo; ?></td>
                             <td><?php echo $descricao; ?></td>
                             <td><?php echo $cor; ?></td>
                             <td><?php echo $fornecedor; ?></td>
                             <td><?php echo $data2; ?></td>
                             <td>
                             <a class="btn btn-info" href="produtos.php?func=edita&id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i></a>

                             <a class="btn btn-danger" href="produtos.php?func=deleta&id=<?php echo $id; ?>"><i class="fa fa-minus-square"></i></a>

                             </td>
                            </tr>

                            <?php 
                              }                        
                            ?>
                            

                        </tbody>
                      </table>
                          <?php 
                              }                        
                            ?>
                    </div>
                  </div>
                </div>
              </div>

</div>




 <!-- Modal -->
      <div id="modalExemplo" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Produtos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Código</label>
                <input type="text" class="form-control mr-2" name="txtcodigo" id="txtcodigo" placeholder="Código" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Descrição</label>
                <input type="text" class="form-control mr-2" name="txtdescricao" placeholder="Descrição" required>
              </div>
               <div class="form-group">
                <label for="cor">Cor</label>
                 <input type="text" class="form-control mr-2" name="txtcor" placeholder="Cor 1" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                 <input type="text" class="form-control mr-2" name="txtfornecedor" id="txtcpf" placeholder="Fornecedor" required>
              </div>
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="button">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    




</body>
</html>




<!--CADASTRAR -->

<?php
if(isset($_POST['button'])){
  $nome = $_POST['txtnome'];
  $codigo = $_POST['txtcodigo'];
  $descricao = $_POST['txtdescricao'];
  $cor = $_POST['txtcor'];
  $fornecedor = $_POST['txtfornecedor'];


  //VERIFICAR SE O CPF JÁ ESTÁ CADASTRADO
  $query_verificar = "select * from produtos where codigo = '$codigo' ";

  $result_verificar = mysqli_query($conexao, $query_verificar);
  $row_verificar = mysqli_num_rows($result_verificar);

  if($row_verificar > 0){
  echo "<script language='javascript'> window.alert('Código já Cadastrado!'); </script>";
  exit();
  }


$query = "INSERT into produtos (nome, codigo, descricao, cor, fornecedor, data) VALUES ('$nome', '$codigo', '$descricao', '$cor', '$fornecedor', curDate() )";

$result = mysqli_query($conexao, $query);

if($result == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Cadastrar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='produtos.php'; </script>";
}

}
?>


<!--EXCLUIR -->
<?php
if(@$_GET['func'] == 'deleta'){
  $id = $_GET['id'];
  $query = "DELETE FROM produtos where id = '$id'";
  mysqli_query($conexao, $query);
  echo "<script language='javascript'> window.location='produtos.php'; </script>";
}
?>



<!--EDITAR -->
<?php
if(@$_GET['func'] == 'edita'){  
$id = $_GET['id'];
$query = "select * from produtos where id = '$id'";
$result = mysqli_query($conexao, $query);

 while($res_1 = mysqli_fetch_array($result)){


?>

  <!-- Modal -->
      <div id="modalEditar" class="modal fade" role="dialog">
        <div class="modal-dialog">
         <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              
              <h4 class="modal-title">Produtos</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form method="POST" action="">
              <div class="form-group">
                <label for="id_produto">Nome</label>
                <input type="text" class="form-control mr-2" name="txtnome" placeholder="Nome" value="<?php echo $res_1['nome']; ?>" required>
              </div>
              <div class="form-group">
                <label for="id_produto">Código</label>
                <input type="text" class="form-control mr-2" name="txtcodigo" id="txtcodigo" placeholder="Código" value="<?php echo $res_1['codigo']; ?>" required>
              </div>
              <div class="form-group">
                <label for="quantidade">Descrição</label>
                <input type="text" class="form-control mr-2" name="txtdescricao" placeholder="Descrição" value="<?php echo $res_1['descricao']; ?>" required>
              </div>
               <div class="form-group">
                <label for="fornecedor">Cor</label>
                 <input type="text" class="form-control mr-2" name="txtcor" placeholder="Cor 1" value="<?php echo $res_1['cor']; ?>" required>
              </div>
              <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                 <input type="text" class="form-control mr-2" name="txtfornecedor" id="txtfornecedor" placeholder="Fornecedor" value="<?php echo $res_1['fornecedor']; ?>" required>
              </div>
            </div>
                   
            <div class="modal-footer">
               <button type="submit" class="btn btn-success mb-3" name="buttonEditar">Salvar </button>


                <button type="button" class="btn btn-danger mb-3" data-dismiss="modal">Cancelar </button>
            </form>
            </div>
          </div>
        </div>
      </div>    

 

 <script> $("#modalEditar").modal("show"); </script> 

<!--Comando para editar os dados UPDATE -->
<?php
if(isset($_POST['buttonEditar'])){
  $nome = $_POST['txtnome'];
  $codigo = $_POST['txtcodigo'];
  $descricao = $_POST['txtdescricao'];
  $cor = $_POST['txtcor'];
  $fornecedor = $_POST['txtfornecdor'];


  if ($res_1['codigo'] != $codigo){

       //VERIFICAR SE O CPF JÁ ESTÁ CADASTRADO
    $query_verificar = "select * from produtos where codigo = '$codigo' ";

    $result_verificar = mysqli_query($conexao, $query_verificar);
    $row_verificar = mysqli_num_rows($result_verificar);

    if($row_verificar > 0){
    echo "<script language='javascript'> window.alert('Código já Cadastrado!'); </script>";
    exit();
    }

  }

 


$query_editar = "UPDATE produtos set nome = '$nome', codigo = '$codigo', descricao = '$descricao', cor = '$cor', fornecedor = '$fornecedor' where id = '$id' ";

$result_editar = mysqli_query($conexao, $query_editar);

if($result_editar == ''){
  echo "<script language='javascript'> window.alert('Ocorreu um erro ao Editar!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Editado com Sucesso!'); </script>";
    echo "<script language='javascript'> window.location='produtos.php'; </script>";
}

}
?>


<?php } }  ?>





