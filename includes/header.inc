<?php

//composing the title
if ($cr !== 0) { $title = $cr.' | '; }
else { $title = ''; }

$url = "http://$_SERVER[HTTP_HOST]";

echo '<?xml version="1.0" encoding="UTF-8"?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>'.crime('name', $id_cr).' - Ocorrências em São Paulo</title>
	<meta name="description" content="Estatísticas autalizadas sobre ocorrências e crimes no Estado de São Paulo.">
	<meta name="keywords" content="'.crime('name', $id_cr).', estatísticas criminais, estatísticas crimes, crimes são paulo, ocorrências">
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
	<link rel="apple-touch-icon-precomposed" href="/img/icon/apple-touch-icon.png" />
	<link rel="stylesheet" type="text/css" href="css/css.css" />
		<!-- qTIP begins -->
		<script type="text/javascript" src="//code.jquery.com/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="http://www.montanheiro.com.br/labs/buendia/js/jquery.qtip-1.0.0-rc3.js"></script>
		<!-- qTIP ends -->
</head>

<body class="yui-skin-sam">
<div id="header">
<div id="logo"><a href="'.$url.'"><img src="'.$url.'/images/logo.jpg"/></a></div>
<div id="logolinks">
<div id="item_header"><a href="'.$url.'">Início</a></div>
<div id="item_header"><a href="'.$url.'/sobre.php">Sobre</a></div>
<div id="item_header">
	<a href="http://twitter.com/home?status=Ocorrencias+no+Estado+de+Sao+Paulo http://ocorrenciasemsaopaulo.com.br/"><img title="compartilhar via twitter" alt="compartilhar via twitter" src="images/twitter.png"/></a>
	<a href="http://www.facebook.com/share.php?u=http://ocorrenciasemsaopaulo.com.br/"><img title="compartilhar via facebook" alt="compartilhar via facebook" src="images/facebook.png"/></a>
	<a href="http://del.icio.us/login/?url=http://ocorrenciasemsaopaulo.com.br/&amp;title=Ocorrencias+no+Estado+de+Sao+Paulo"><img title="adicionar ao delicious" alt="delicious" src="images/delicious.png"/></a>
</div>
</div>
</div>
<body class="en member v2 active-user js" id="pagekey-home">
<div timeout="1032" hidepaneltimeout="2805" id="body">';
?>