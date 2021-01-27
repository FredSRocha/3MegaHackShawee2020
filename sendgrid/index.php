<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
include "../conexao.php";
date_default_timezone_set('America/Sao_Paulo');
$fullDate = date('m/d/Y h:i:s a', time());
$date = date('m/d/Y', time());
$hour = date('h:i:s a', time());
//O rendimento da poupança atualmente é de 4,2% ao ano.

//if(isset($_POST)){
  //var_dump($_POST);

  //echo $purchase;
$data = json_decode(file_get_contents("php://input"));

if($data){
  //UPDATE `crowdfunding` SET `id`=[value-1],`value`=[value-2],`received`=[value-3],`status`=[value-4],`created`=[value-5] WHERE 1
    $id = $data->id; //"14578967";
    $value = $data->value; //"7000.00";
    $received = $data->pay;
    $purchase = $data->received + $data->pay;
    $sql = "UPDATE `crowdfunding` SET `received` = '{$purchase}' WHERE `id` = '{$data->id}'";
} else {
    $id = $_POST["id"]; //"14578967";
    $value = $_POST["value"]; //"7000.00";
    $received = $_POST["pay"];
    $purchase = $_POST["received"] + $_POST["pay"];
    $sql = "UPDATE `crowdfunding` SET `received` = '{$purchase}' WHERE `id` = '{$_POST["id"]}'";
}

$percentageTrackMoney = 10;
$percentageSavings = 3.15;
$profitTrackMoney = $percentageTrackMoney * $received / 100;
$profitSavings = $percentageSavings * $received / 100;

$result = $conn->query($sql);
/*
if ($result === TRUE) {
    echo "Compra processada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}
*/

$conn->close();
    // You need to install the sendgrid client library so run:     
    // composer require sendgrid/sendgrid
    //require './vendor/autoload.php';
    
    // contains a variable called: $API_KEY that is the API Key.
    //// You need this API_KEY created on the Sendgrid website.
    //include_once('./credentials.php');
$API_KEY = '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';
    
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("fredericostefano@gmail.com", "Fred Rocha");
$email->setSubject("Compra de recebível realizada com sucesso!");
$email->addTo("fredsrocha1985@gmail.com", "Fred Tester");
$email->addContent("text/plain", "Aquisição de Recebível. Você receberá o valor pela compra em 12 meses. A lucratividade será 10% sobre o valor investido, enquanto a poupança assegura menos da metade, apenas 4,2%.");
$email->addContent(
    "text/html", '<body style="margin: 0; padding: 0;"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif;"><tr><td><table class="container" width="600px" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff;"><tr><td><table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff;"><tr><td> <img width="32px" style="padding-left: 1em;" src="https://trackmoney.u3startups.com/assets/media/images/icons/money_32.png" alt="TrackMoney"></td><td align="right"><p style="font-size: 32px; color: #888888;padding-right: 0.75em;">Fatura de Recebível</p></td></tr></table></td></tr><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="background-color: #fafafa;"><tr><td><table class="invoice-left" width="50%" align="left" border="0" cellpadding="0" cellspacing="0" style="padding-top: 10px; padding-left: 20px;"><tr><td><p style="margin: 0; font-size: 10px; text-transform: uppercase; color: #666666;"> ID do Recebível</p><p style="margin: 0; font-size: 12px;">'.$id.'</p></td></tr><tr><td style="border: 1px #ffffff solid"><p style="margin-bottom: 0; font-size: 10px; text-transform: uppercase; color: #666666;"> Data da Compra</p><p style="margin-top: 0; font-size: 12px;">'.$date.'</p></td></tr><tr><td><p style="margin-bottom: 0; font-size: 10px; text-transform: uppercase; color: #666666;"> ID da Compra</p><p style="margin-top: 0; font-size: 12px;">REF'.$id.'</p></td></tr></table><table class="invoice-right" width="50%" align="right" border="0" cellpadding="0" cellspacing="0" style="padding-left: 20px;"><tr><td><p style="margin-bottom: 0; font-size: 10px; text-transform: uppercase; color: #666666;"> Provedor</p><p style="margin: 0; font-size: 12px;">TrackMoney</p></td></tr></table></td></tr></table></td></tr><tr><td style="padding-top: 30px;"><table class="apple-services" border="0" cellpadding="0" cellspacing="0"><p style="padding: 7px; font-size: 14px; font-weight: 500; background-color: #fafafa;"> Track Money Invest</p></table></td></tr><tr><td style="padding-left: 20px;"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding: 0 0 15px;"><tr><td><table align="left" border="0" cellpadding="0" cellspacing="0"><tr><td> <img width="64px" src="https://trackmoney.u3startups.com/assets/media/images/emails/negotiation/bottom.png" alt="TrackMoney Invest"></td><td align="left" style="padding-left: 20px;"><p style="margin: 0; font-size: 12px; font-weight: 600; color: #333333;"> Valor da Compra</p><p style="margin: 0; font-size: 12px; color: #666666;">Valor da Oferta</p></td></tr></table><table align="right" border="0" cellpadding="0" cellspacing="0"><tr><td align="right"><p style="margin: 10px; font-size: 12px; font-weight: 600;">R$ '.number_format($received, 2, ',', '.').'</p><p style="margin: 10px; font-size: 12px; font-weight: 600;color: #666666;">R$ '.number_format($value, 2, ',', '.').'</p></td></tr></table></td></tr></table></td></tr><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding: 5px; border-top: 1px solid #eeeeee; border-bottom: 1px solid #eeeeee;"><tr><td align="right"><p style="margin: 0; font-size: 12px; color: #666666;">Lucratividade garantida</p></td></tr></table></td></tr><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding: 10px 0;border-bottom: 1px solid #eeeeee;"><tr><td align="right"><p class="total-price" style="margin: 4px; font-size: 12px; color: #666666;"><span style="font-weight: 900;">'.$percentageTrackMoney.'%</span> com a TrackMoney <span style="font-weight: 600; color:#000000">R$ '.number_format($profitTrackMoney, 2, ',', '.').'</span></p><p class="total-price" style="margin: 4px; font-size: 12px; color: #666666;">'.$percentageSavings.'% com a poupança <span style="font-weight: 600; color:#000000">R$ '.number_format($profitSavings, 2, ',', '.').'</span></p></td></tr></table></td></tr><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="right"><table border="0" cellpadding="0" cellspacing="0"><tr><td width="70%" align="right" style="border-right: 1px solid #eeeeee;"><p style="padding-right: 35px; font-size: 10px; text-transform: uppercase; color: #666666;"> TOTAL</p></td><td width="30%"><p class="total-price" style="padding: 0 20px; font-size: 16px; font-weight: 600;"> R$ '.number_format($received + $profitTrackMoney, 2, ',', '.').'</p></td></tr></table></td></tr></table></td></tr><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center"><p style="font-size: 12px; color: #666666;">*Resgatáveis em 12 meses. <a href="https://trackmoney.u3startups.com" style="text-decoration: none; color: #007eff;">Visite a TrackMoney</a>.</p></td></tr></table></td></tr><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0"><tr><td align="center"><p style="margin-bottom: 0; font-size: 12px; color: #666666;"> Copyright © 2020 TrackMoney</p></td></tr></table></td></tr></table></td></tr></table></td></tr></table></body>'
);
$sendgrid = new \SendGrid($API_KEY);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}

header("location: ../index-crowdfunding.php");

/*
    $FROM_EMAIL = 'fredericostefano@gmail.com'; 
    // they dont like when it comes from @gmail, prefers business 
    // emails
    
    $TO_EMAIL = 'paulinho.crisci@gmail.com'; 
    // Try to be nice. Take a look at the anti spam laws. In most
    // cases, you must have an unsubscribe. You also cannot be 
    // misleading.
    $email = new \SendGrid\Mail\Mail(); 
    $subject = "A sua quitação de débito foi recebida com sucesso!"; 
    $from = $email->setFrom($FROM_EMAIL, "Fred Rocha");
    $to = $email->addTo( $TO_EMAIL, "Paulinho CTO");
    $htmlContent = '<div style="width: 90%; margin-left: auto; margin-right: auto; background-color: #fff;"><p style="font-size: 24px">YEAH irmão! A API do SendGrid foi dominada!</p></div>';
    // Create Sendgrid content
    $content = $email->addContent("text/html",$htmlContent);
    $sendgrid = new \SendGrid($API_KEY);
    // Create a mail object
    //$sendgrid->send($email);
    $response = $sendgrid->send($email);
    //$mail = new SendGrid\Mail($from, $subject, $to, $content);
    
    //$sg = new \SendGrid($API_KEY);
    //$response = $sg->client->mail()->send()->post($mail);
      
    if ($response->statusCode() == 202) {
     // Successfully sent
     echo 'done';
    } else {
     echo 'false' . $response->statusCode();
    }
    */
?>