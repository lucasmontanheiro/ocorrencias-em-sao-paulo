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
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<!-- qTIP begins -->
		<script type="text/javascript" src="//code.jquery.com/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="http://www.montanheiro.com.br/labs/buendia/js/jquery.qtip-1.0.0-rc3.js"></script>
		<!-- qTIP ends -->
	
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<script type="text/javascript">
      google.load("visualization", "1.1", {packages:["table"]});
      google.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn(\'string\', \'Year\');
        data.addColumn(\'number\', \'Salary\');
        data.addColumn(\'boolean\', \'Full Time Employee\');
        data.addRows([
          [\'2005\',  {v: 10000, f: \'$10,000\'}, true],
          [\'2006\',   {v:8000,   f: \'$8,000\'},  false],
          [\'2007\', {v: 12500, f: \'$12,500\'}, true],
          [\'2008\',   {v: 7000,  f: \'$7,000\'},  true]
        ]);

        var table = new google.visualization.Table(document.getElementById(\'table_div1\'));

        table.draw(data, {showRowNumber: true, width: \'100%\', height: \'200px\'});
      }
    </script>


</head>

<body class="yui-skin-sam">

<div id="body_header">

<div id="header">

<div class="col-lg-12">
	<div class="col-lg-4">
		<a href="/"><img src="images/logo.jpg"/></a>
	</div>
	<div class="col-lg-4"></div>
	<div class="col-lg-4 vcenter">
		<div id="item_header"><a href="/">Início</a></div>
		<div id="item_header"><a href="sobre.php">Sobre</a></div>
		<div id="item_header">
			<a href="http://twitter.com/home?status=Ocorrencias+no+Estado+de+Sao+Paulo http://ocorrenciasemsaopaulo.com.br/"><img title="compartilhar via twitter" alt="compartilhar via twitter" src="images/twitter.png"/></a>
			<a href="http://www.facebook.com/share.php?u=http://ocorrenciasemsaopaulo.com.br/"><img title="compartilhar via facebook" alt="compartilhar via facebook" src="images/facebook.png"/></a>
			<a href="http://del.icio.us/login/?url=http://ocorrenciasemsaopaulo.com.br/&amp;title=Ocorrencias+no+Estado+de+Sao+Paulo"><img title="adicionar ao delicious" alt="delicious" src="images/delicious.png"/></a>
		</div>
	</div>
</div>
</div>
</div>

<!--<body class="en member v2 active-user js" id="pagekey-home">-->
<div timeout="1032" hidepaneltimeout="2805" id="body">
<div class="container-fluid">

<div class="col-lg-12">
';
?>