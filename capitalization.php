<?php
require_once "conexao.php";
include('includes/header.php'); 
include('includes/navbar.php');
/*
if(isset($_POST)) {
  var_dump($_POST);
}
$name = $_POST['products_name_dashboard'];
$amount = $_POST['amount_dashboard'];

$sql = "INSERT INTO tbproduto (products_name_dashboard, amount_dashboard)  VALUES ('$name', '$amount')";

if (mysqli_query($conn, $sql)){
    header("location:insert.php");
}else{
    echo "erro: " . $sql . "<br>" . mysqli_error($conn);
}
 mysqli_close($conn);
*/

?>
 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 

    

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Título Recebível</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./capitalization-insert.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label>Valor</label>
                <input type="number" name="value" class="form-control" placeholder="Digite o valor que deseja ofertar">
            </div>
            <div class="form-group">
              <label for="inputState">Situação para Investidores</label>
              <select id="inputState" name="status" class="form-control">
                <option value="0" selected>Oferta inativa</option>
                <option value="1">Oferta ativa</option>
              </select>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <button type="submit" name="submitCapitalization" class="btn btn-primary">Cadastrar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Recebíveis
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Criar Título
            </button>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <?php
                   $sql = "SELECT * FROM crowdfunding";
                   if($result = mysqli_query($conn, $sql)){
                       if(mysqli_num_rows($result) > 0){
                           echo "<table class='table table-bordered table-striped'>";
                               echo "<thead>";
                                   echo "<tr>";
                                       echo "<th>ID</th>";
                                       echo "<th>Valor</th>";
                                       echo "<th>Disponibilidade</th>";                                    
                                       echo "<th>Ações</th>";
                                   echo "</tr>";
                               echo "</thead>";
                               echo "<tbody>";
                               while($row = mysqli_fetch_array($result)){
                                   echo "<tr>";
                                       echo "<td>" . $row['id'] . "</td>";
                                       echo "<td>" . $row['value'] . "</td>";
                                       echo "<td>" . $row['status'] . "</td>";
                                       
                                       echo "<td>";
                                           echo "<a href='capitalization-read.php?id=". $row['id'] ."' title='Visualizar' data-toggle='tooltip'><i class='far fa-eye'></i></span> </a>";
                                           echo "<a href='capitalization-edit.php?id=". $row['id'] ."' title='Atualizar' data-toggle='tooltip'><i class='far fa-edit'></i></span> </a>";
                                           echo "<a href='capitalization-delete.php?id=". $row['id'] ."' title='Deletar' data-toggle='tooltip'><i class='far fa-trash-alt'></i></span></a>";
                                       echo "</td>";
                                   echo "</tr>";
                               }
                               echo "</tbody>";                            
                           echo "</table>";
                           
                           mysqli_free_result($result);
                       } else{
                           echo "<p class='lead'><em>Não há dados para serem apresentados.</em></p>";
                       }
                   } else{
                       echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conn);
                   }
                   mysqli_close($conn);
                   ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>