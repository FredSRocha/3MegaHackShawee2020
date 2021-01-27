
 
<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "conexao.php";
    $sql = "SELECT * FROM crowdfunding WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            } else{
                header("location: index.php");
                exit();
            }
            
        } else{
            echo "Opa! Algo deu errado. Por favor, tente novamente mais tarde.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else{
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagamento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
        .wrapper {
            max-width: 500px;
            margin: 0 auto;
        }
        footer .copyright {
            padding: 1.5em 0;
            font-size: 13px;
        }
        @media (max-width: 768px) {
            #paypal-button {
                margin-top: 2em !important;
            }
        }
        .bg-trackmoney {
            background-color: #4e73df!important;
        }
</style>
    
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="page-header">
                        <h1>Título Recebível</h1>
                    </div>
                    <br>
                    <div class="card" >
                        <img class="card-img-top img-fluid" src="https://s3.criptofacil.com/wp-content/uploads/2018/05/crowdbit-conheca-a-primeira-plataforma-de-crowdfunding-com-criptoativos-do-brasil.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">ID <?php echo $row["id"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">R$ <?php echo number_format($row["value"], 2, ',', '.'); ?></h6>
                            <p class="card-text">São <b>R$ <?php echo number_format($row["value"], 2, ',', '.'); ?></b> reais com lucratividade de 3% (11x mais que a poupança, atualmente em 0,25%) pagáveis em 90 dias após a aquisição completa do valor.</p>
                            <div class="progress">
                                <?php
                                    $progress = ($row["received"]/$row["value"])*100;
                                    if($progress < 50){ ?>
                                    <div class="progress-bar progress-bar-striped bg-trackmoney progress-bar-animated" style="width: <?php echo $progress; ?>%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <?php } else if($progress > 50 && $progress < 85){ ?>
                                    <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" style="width: <?php echo $progress; ?>%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <?php } else { ?>
                                    <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width: <?php echo $progress; ?>%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                <?php } ?>
                            </div>
                            <table style="width:100%; margin-top:2.5em; text-align:center">
                            <tr>
                                <th>Até agora</th>
                                <th>Objetivo</th>
                            </tr>
                            <tr>
                                <td class="text-success">R$ <?php echo number_format($row["received"], 2, ',', '.'); ?></b></td>
                                <td class="text-danger">R$ <?php echo number_format($row["value"], 2, ',', '.'); ?></b></td>
                            </tr>
                            </table>
                        </div>
                        <div class="card-body text-center">
                            <form id="formPayment" action="./sendgrid/index.php" method="POST">
                                <div class="input-group mb-3">
                                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                    <input type="hidden" name="value" value="<?php echo $row["value"]; ?>" />
                                    <input type="hidden" name="received" value="<?php echo $row["received"]; ?>" />
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">R$</span>
                                    </div> 
                                    <input id="pay" name="pay" type="number" min="0" max="<?php echo $row["value"] - $row["received"]; ?>" step="1" class="form-control" placeholder="Valor do investimento" aria-label="Valor do investimento" aria-describedby="basic-addon1">
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="crowdfunding.php" class="btn btn-light card-link w-100">Voltar</a>
                                </div>
                                <div class="col-md-6">
                                    <div class="paypal" id="paypal-button"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Disponibilizado em: <?php echo date('d/m/Y', strtotime($row["created"])); ?> às <?php echo date('H:i:s', strtotime($row["created"])); ?></small>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="text-muted"><b>&copy; 2020 TrackMoney</span>
          </div>
        </div>
      </footer>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  function setValue() {
    const value = document.querySelector('#pay').value;
    return value;
  }
  paypal.Button.render({
    env: 'sandbox',
    client: {
      sandbox: 'demo_sandbox_client_id',
      production: 'demo_production_client_id'
    },
    locale: 'pt_BR',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },
    commit: true,
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: setValue(),
            currency: 'BRL'
          }
        }]
      });
    },
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        console.log('Send email to user');
        document.querySelector('#formPayment').submit();
        
      });
    }
  }, '#paypal-button');
</script>
</body>
</html>

