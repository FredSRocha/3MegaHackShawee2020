<!DOCTYPE html>
<html lang="en">

<head>
  <script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', function() {
      navigator.serviceWorker.register('sw.js')
      .then(function() { console.log("Service Worker Registered."); });
      });
    }  
  </script>
  <meta charset="utf-8">
  <meta content="IE=Edge" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
  <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png?v=bORgE05Pwr">
  <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png?v=bORgE05Pwr">
  <link rel="icon" type="image/png" sizes="192x192" href="./img/favicon/android-chrome-192x192.png?v=bORgE05Pwr">
  <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png?v=bORgE05Pwr">
  <link rel="manifest" href="./manifest.json?v=bORgE05Pwr">
  <link rel="mask-icon" href="./img/favicon/safari-pinned-tab.svg?v=bORgE05Pwr" color="#5bbad5">
  <link rel="shortcut icon" href="./favicon.ico?v=bORgE05Pwr">
  <meta name="apple-mobile-web-app-title" content="Track Money">
  <meta name="application-name" content="Track Money">
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="msapplication-TileImage" content="./img/favicon/mstile-144x144.png?v=bORgE05Pwr">
  <meta name="theme-color" content="#ffffff">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link href="./img/splashscreens/iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/iphonexr_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/iphonexsmax_splash.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/ipadpro3_splash.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <link href="./img/splashscreens/ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
  <title>TrackMoney | Soluções</title>
  <meta name="description" content="Monitore o desempenho financeiro dos seus canais online e gerencie solicitações, recebimentos, negociação e cobrança de recebíveis.">
  <meta name="author" content="Shawee by Time 40">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .bg-gradient-primary {
      background: #4e73df;  /* fallback for old browsers */
      background: -webkit-linear-gradient(to right, #6dd5ed, #4e73df);  /* Chrome 10-25, Safari 5.1-6 */
      background: linear-gradient(to right, #6dd5ed, #4e73df); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #wrapper #content-wrapper {
      background-color: #ffffff;
    }
  </style>
</head>
<body id="page-top">
  <div id="wrapper">