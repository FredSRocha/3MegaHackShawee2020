<?php
require_once "conexao.php";
 

$value = $status = 0;
//$nome_erro = $endereco_erro = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    var_dump($_POST);
  
    $id = $_POST["id"];
    $value = $_POST["value"];
    $status = $_POST["status"];
    /*
    $nome_informado = trim($_POST["products_name_dashboard"]);
    if(empty($nome_informado)){
        $nome_erro = "Por favor, entre com um nome.";
    } elseif(!filter_var($nome_informado, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nome_erro = "Por favor, entre com um nome válido.";
    } else{
        $nome = $nome_informado;
    }
    
    $endereco_informado = trim($_POST["amount_dashboard"]);
    if(empty($endereco_informado)){
        $endereco_erro = "Por favor, entre com uma quantidade.";     
    } else{
        $endereco = $endereco_informado;
    }

    if(empty($nome_erro) && empty($endereco_erro) && empty($salario_erro)){
*/
        $sql = "UPDATE crowdfunding SET `value`=?, `status`=? WHERE id=?";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ssi", $param_value, $param_status, $param_id);

            $param_value = $value;
            $param_status = $status;
            $param_id = $id;
                 
            if(mysqli_stmt_execute($stmt)){
                header("location: capitalization.php");
                exit();
            } else{
                echo "Algo deu errado. Tente novamente.";
            }
        }
         
        mysqli_stmt_close($stmt);
   // }
    
    mysqli_close($conn);
} else{
    
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM crowdfunding WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){

            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $value = $row["value"];
                    $status = $row["status"];
                   
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Algo deu errado, tente novamente mais tarde.";
            }
        }
    
        mysqli_stmt_close($stmt);
        
        mysqli_close($conn);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Recebível</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Atualizar Informações</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group ">
                            <label>Valor</label>
                            <input type="text" name="value" class="form-control" value="<?php echo $value; ?>">
                           
                        </div>
                        <div class="form-group">
                            <label for="inputState">Situação para Investidores</label>
                            <?php
                                $option2Text = ($status == 1) ? "Oferta inativa" : "Oferta ativa"; 
                                $option2Value = ($status == 1) ? 0 : 1; 
                            ?>
                            <select id="inputState" name="status" class="form-control">
                                <option value="<?php echo ($status == 1) ? 1 : 0; ?>" selected><?php echo ($status == 1) ? "Oferta ativa" : "Oferta inativa"; ?></option>
                                <option value="<?php echo $option2Value; ?>"><?php echo $option2Text; ?></option>
                            </select>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Atualizar">
                        <a href="capitalization.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>