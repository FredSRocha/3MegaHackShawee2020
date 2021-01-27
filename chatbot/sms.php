<?php

require 'totalvoice/vendor/autoload.php';

use TotalVoice\Client as TotalVoiceClient;

//if (isset($_POST["notifyDriverSubmit"]))
//{

    // TOTALVOICE
    $client = new TotalVoiceClient('5117687945ddded8c0568f478ef04b08');
    
    $response = $client->sms->enviar(
        '31984248321',
        'Olá, Uma negociação de débito foi recebida, acompanhe-a em: https://trackmoney.u3startups.com'
    );

    //echo $response->getContent(); // {}
/*
    // ZENVIA WHATSAPP
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.zenvia.com/v1/channels/whatsapp/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"from\": \"exultant-swordtail\",\n  \"to\": \"55".$_POST["phone"]."\",\n  \"contents\": [{\n    \"type\": \"text\",\n    \"text\": \"Olá, prezado(a) agende a sua consulta na página: https://forms.gle/Zd5dthh93s9TTLE39\"\n  }]\n}");
    
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'X-Api-Token: GQHWhhyVp9_ZHDcFhDg9WKAzmwVBBlHU53Xl';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    
    curl_close($ch);
    */

    echo "<script>alert('A sua solicitação para negociação dos débitos foi encaminhada para o setor de cobranças e em breve entrarão em contato para ofertar condições especiais de pagamento.');location.href = 'index.html';</script>";
    //header("location: index.html");
//}

?>