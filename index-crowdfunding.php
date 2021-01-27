<?php
require_once "conexao.php";
include('includes/header.php'); 
include('includes/navbar-crowdfunding.php');
$sql = "SELECT * FROM crowdfunding";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){     
      $totalValue = 0;
      $totalReceive = 0;
      while($row = mysqli_fetch_array($result)){
        $totalValue += $row['value'];
        $totalReceive += $row['received'];
      }
    } else{
        echo "<p class='lead'><em>Não há ofertas.</em></p>";
    }
} else{
    echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conn);
}
?>
<style>
.chart {
  width: 100%;
  min-height: 450px;
}
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['name', 'value'],
         <?php
            echo"['Ofertas',".$totalValue."],['Compras',".$totalReceive."]";
         ?>
        ]);

        var options = {
          title: 'Transações gerais',
          colors: ['#34a853', '#fbbc05']
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Poupança", 3.15, "#dc3912"],
        ["TrackMoney", 10, "#4e73df"]
      ]);
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
      var options = {
        title: "Lucratividade anual",
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("barchart"));
      chart.draw(view, options);
  }
  </script>
<style>
h6 {
  text-align: center;
  padding-bottom: 1.5em;
}
</style>
<div class="container-fluid">
  <h6 class="m-0 font-weight-bold text-primary">VALORES TOTAIS</h6>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Títulos</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                $sql = "SELECT * FROM crowdfunding";
                if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo mysqli_num_rows($result);
                  } else{
                    echo "<p class='lead'><em>Não há títulos.</em></p>";
                  }
                } else{
                    echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conn);
                }
              ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-copy fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ofertas</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
              <?php
                $sql = "SELECT * FROM crowdfunding";
                if($result = mysqli_query($conn, $sql)){
                    if(mysqli_num_rows($result) > 0){     
                      $total = 0;
                      while($row = mysqli_fetch_array($result)){
                        $total += $row['value'];
                      }
                      echo "R$ " . number_format($total, 2, ',', '.');
                    } else{
                        echo "<p class='lead'><em>Não há ofertas.</em></p>";
                    }
                } else{
                    echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conn);
                }               
              ?>
            </div>
            <div class="col-auto">
              <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Conversões</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                      <?php
                   $sql = "SELECT * FROM crowdfunding";
                   if($result = mysqli_query($conn, $sql)){
                       if(mysqli_num_rows($result) > 0){
                          $total = 0;
                          while($row = mysqli_fetch_array($result)){
                            $total += $row['received'];
                          }
                          echo "R$ " . number_format($total, 2, ',', '.');
                       } else{
                           echo "<p class='lead'><em>Não há compras realizadas.</em></p>";
                       }
                   } else{
                       echo "ERRO: Não foi possível executar $sql. " . mysqli_error($conn);
                   }
                   ?>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Poupança</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
             <p>3.15%</p>
            </div>
            <div class="col-auto">
              <i class="fas fa-comment-dollar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div id="piechart" style="width: 100%; height: auto;"></div>
    </div>
    <div class="col-md-6">
      <div id="barchart" style="width: 100%; height: auto;"></div>
    </div>
  </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>