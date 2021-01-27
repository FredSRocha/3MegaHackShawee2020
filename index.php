<?php
require_once "conexao.php";
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['name', 'amount'],
      <?php
      $sql = "SELECT * FROM payment_method";
      $fire = mysqli_query($conn,$sql);
      while ($result = mysqli_fetch_assoc($fire)) {
        echo"['".$result['name']."',".$result['amount']."],";
      }

      ?>
    ]);

    var options = {
      title: 'Formas de pagamento'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_payment_method'));

    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['name', 'amount'],
      <?php
      $sql = "SELECT * FROM payment_option";
      $fire = mysqli_query($conn,$sql);
      while ($result = mysqli_fetch_assoc($fire)) {
        echo"['".$result['name']."',".$result['amount']."],";
      }

      ?>
    ]);

    var options = {
      title: 'Meios de pagamento'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_payment_option'));

    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['name', 'amount'],
      <?php
      $sql = "SELECT * FROM payment_channel";
      $fire = mysqli_query($conn,$sql);
      while ($result = mysqli_fetch_assoc($fire)) {
        echo"['".$result['name']."',".$result['amount']."],";
      }

      ?>
    ]);

    var options = {
      title: 'Canais'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_payment_channel'));

    chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['name', 'amount'],
      <?php
      $sql = "SELECT * FROM payment_installment";
      $fire = mysqli_query($conn,$sql);
      while ($result = mysqli_fetch_assoc($fire)) {
        echo"['".$result['name']."',".$result['amount']."],";
      }

      ?>
    ]);

    var options = {
      title: 'Parcelas'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_payment_installment'));

    chart.draw(data, options);
  }
</script>
<script>
google.load('visualization', '1', {'packages': ['geochart']});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
  var data = google.visualization.arrayToDataTable([
        ['Código', 'Estado', 'Inadimplentes'],     
          [ 'BR-AC','Rio Branco', 33],
    ['BR-AL','Maceió', 19],
    ['BR-AP','Macapá', 31],
    ['BR-AM','Manaus', 32],
    ['BR-BA','Salvador', 30],
    ['BR-CE','Fortaleza', 33],
    ['BR-DF','Brasília', 33],
    ['BR-ES','Vitória', 29],
    ['BR-GO','Goiânia', 34],
    ['BR-MA','São Luís', 32],
    ['BR-MT','Cuiabá', 33],
    ['BR-MS','Campo Grande', 33],
    ['BR-MG','Belo Horizonte', 39],
    ['BR-PA','Belém', 29],
    ['BR-PB','João Pessoa', 28],
    ['BR-PR','Curitiba', 30],
    ['BR-PE','Recife', 33],
    ['BR-PI','Teresina', 30],
    ['BR-RJ','Rio de Janeiro', 20],
    ['BR-RN','Natal', 28],
    ['BR-RS','Porto Alegre', 17],
    ['BR-RO','Porto Velho', 31],
    ['BR-RR','Boa Vista', 21],
    ['BR-SC','Florianópolis', 22],
    ['BR-SP','São Paulo', 22],
    ['BR-SE','Aracaju', 32],
    ['BR-TO', 'Palmas', 33]
  ]);

      var opts = {
        region: 'BR',
        domain:'BR',
        displayMode: 'regions',
        colorAxis: {colors: ['#e5ef88', '#d4b114', '#e85a03']},
        resolution: 'provinces',
        /*backgroundColor: '#81d4fa',*/
        /*datalessRegionColor: '#81d4fa',*/
        defaultColor: '#f5f5f5',
        width: 640, 
        height: 480
      };
      var geochart = new google.visualization.GeoChart(
          document.getElementById('geochart_br'));
      geochart.draw(data, opts);
    };

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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Inadimplentes</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                  $sql = "SELECT * FROM debtor";
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
              <i class="fas fa-users fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Recebíveis</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              </div>
              <?php
                $sql = "SELECT * FROM debtor";
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
              <i class="fas fa-file-invoice-dollar fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Canal em Destaque</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                </div>
                <div class="col">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                      Loja Virtual
                </div>
              </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-icons fa-2x text-gray-300"></i>
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
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Cidade em Destaque</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
              Belo Horizonte (MG)
            </div>
            <div class="col-auto">
              <i class="fas fa-city fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div id="piechart_payment_method" style="width: 100%; height: auto;"></div>
    </div>
    <div class="col-md-6">
      <div id="piechart_payment_option" style="width: 100%; height: auto;"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div id="piechart_payment_channel" style="width: 100%; height: auto;"></div>
    </div>
    <div class="col-md-6">
      <div id="piechart_payment_installment" style="width: 100%; height: auto;"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="geochart_br" style="max-width: 640px; height: auto;margin: auto;"></div>
    </div>
  </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>