<?php
require_once "conexao.php";
include('includes/header.php'); 
include('includes/navbar-crowdfunding.php'); 
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="container-fluid">

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Títulos Recebíveis</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <?php
          $sql = "SELECT * FROM crowdfunding where `status` = 1";
          if($result = mysqli_query($conn, $sql)){
              if(mysqli_num_rows($result) > 0){
                  echo "<table class='table table-bordered table-striped'>";
                      echo "<thead>";
                          echo "<tr>";
                              echo "<th>Ofertas</th>";
                              echo "<th>Visualizar</th>";
                          echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
                      while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                              echo "<td>" . $row['value'] . "</td>";
                              
                              echo "<td>";
                                  echo "<a href='payment.php?id=". $row['id'] ."' title='Visualizar Título' data-toggle='tooltip'><i class='fas fa-eye'></i></span> </a>";
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