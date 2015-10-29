<?php
include ('database.php');
include ('functions.php');

echo '<?xml version="1.0" encoding="iso-8859-1"?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Ocorrências em São Paulo</title>
	<meta name="description" content="Estatísticas autalizadas sobre ocorrências e crimes no Estado de São Paulo.">
	<meta name="keywords" content="estatísticas criminais, estatísticas crimes, crimes são paulo, ocorrências">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<link rel="shortcut icon" type="image/ico" href="http://montanheiro.com.br/labs/buendia/images/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="/img/icon/apple-touch-icon.png" />
	<link rel="stylesheet" type="text/css" href="http://ocorrenciasemsaopaulo.com.br/css.css" />
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/container/assets/container.css">
	<!-- Dependencies -->
	<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
	<!-- OPTIONAL: Animation (only required if using ContainerEffect) -->
	<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/animation/animation-min.js"></script>
	<!-- Source file -->
	<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/container/container-min.js"></script>
</head>
<body class="yui-skin-sam">
	<div id="header">';

include ('includes/header.inc');

echo '
<body class="en member v2 active-user js" id="pagekey-home">
  <div timeout="1032" hidepaneltimeout="2805" id="body">';
include ('includes/sidebar1.inc'); 
echo '
		<div class="wrapper">
			<div id="main_content">
			<h2 id="single">Contato</h2>
			<p>Para entrar em contato envie um email para: <strong>contato@ocorrenciasemsaopaulo.com.br</strong></p>
		</div>
			  
	  
      <div id="main_extra">
	  <h3>Participe</h3>
	  <strong>Nas redes sociais:</strong><br>
	  <ul><li>Orkut (em construção)</li>
	  <li>Facebook (em construção)</li>
	  </ul>';
echo '</div>
    </div>
  </div>';
	include ('includes/footer.inc');
	echo '
</body>
</html>';
?>
