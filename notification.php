<?php
  // ZENVIA WHATSAPP
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v1/channels/whatsapp/messages');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"exultant-swordtail\",\n  \"to\": \"55".$_GET["phone"]."\",\n  \"contents\": [{\n    \"type\": \"text\",\n    \"text\": \"Olá, foi aprovado 8% de desconto na quitação do seu débito, parabéns! Para pagar, clique no link: https://www.mercadopago.com.br/checkout/v1/redirect?pref_id=183000568-7e1a32a8-ed93-4705-8421-99c4afdb6b43\"\n  }]\n}");
  
  $headers = array();
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'X-Api-Token: GQHWhhyVp9_ZHDcFhDg9WKAzmwVBBlHU53Xl';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  
  $result = curl_exec($ch);
  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }
  
  curl_close($ch);

header("location: index.php");