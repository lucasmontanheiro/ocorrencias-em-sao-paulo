<?php
include ('database.php');
$cr = $_GET['cr'];
$allmatches = mysql_query("SELECT * FROM table_macondo WHERE periodo='$cr'")
or die (mysql_error());
echo '<?xml version="1.0" encoding="iso-8859-1"?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="generator" content=
  "HTML Tidy for Windows (vers 14 February 2006), see www.w3.org" />

  <title>Macondo: Home</title>
  <meta http-equiv="content-type" content=
  "text/html; charset=iso-8859-1" />
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
  <link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
  <link rel="apple-touch-icon-precomposed" href=
  "/img/icon/apple-touch-icon.png" />
  <link rel="stylesheet" type="text/css" href="http://montanheiro.com.br/labs/macondo/css.css" />
  <script type="text/javascript" src="http://static.linkedin.com/scds/concat/leo/build-491_6_2159-prod/js?f=lib%2F_yaho&amp;f=lib%2F_data&amp;f=lib%2F_conn&amp;f=lib%2F_auto&amp;f=lib%2F_anim&amp;f=lib%2F_selc&amp;f=lib%2F_cont&amp;f=js%2Fcore%2FDefine&amp;f=js%2Futil%2FHelps&amp;f=js%2Fcore%2FPage&amp;f=lib%2Flui%2Flinkedin_url-min&amp;f=js%2Fglobal_navigation&amp;f=js%2Fads&amp;f=js%2Futil%2FGhostLabel&amp;f=js%2Futil%2FFocusField&amp;f=js%2Fajax%2Fchameleon_service&amp;f=js%2Fopensocial%2Frpc&amp;f=js%2Fopensocial%2Futil&amp;f=js%2Fopensocial%2Fgadgets&amp;f=js%2Fopensocial%2Fgadget_container&amp;f=lib%2Fdwr%2F2.0%2Futil-min&amp;f=lib%2Fdwr%2F2.0%2Fengine-min&amp;f=lib%2Fdwr%2F2.0%2Fengine_fix-min&amp;f=js%2Fajax%2Fui_settings_service&amp;f=js%2Fajax%2Fwebtracking_service&amp;f=js%2Fajax%2Ftypeahead_service&amp;f=static_dwr_js%2FUISettingsService&amp;f=static_dwr_js%2FTypeAheadService&amp;f=static_dwr_js%2FWebTrackingService&amp;f=static_dwr_js%2FChameleonAjaxService&amp;f=js%2Futil%2FShowMore&amp;f=js%2Futil%2FCheckTextarea&amp;f=js%2Fapps%2FMboxArchiveOnHome&amp;f=js%2Fapps%2FPersonalNav"></script>
  <style type="text/css" charset="utf-8">
/*<![CDATA[*/
  .member #header {
  height: 43px;
  }
  /*]]>*/
  </style>
</head>

<body class="en member v2 active-user js" id="pagekey-home"><div id="header" class="member">
    <div class="wrapper">';
include ('includes/header.inc');
echo '
  <div timeout="1032" hidepaneltimeout="2805" id="body">';
include ('includes/sidebar1.inc'); 
echo '
    <div class="wrapper">
      <div id="global-error"></div>

      <div id="content">
        <div id="home-inbox">
          <div data-unreadcount="1">
            <h2><a href="">'.$cr;
			echo '</a><span>';
			echo '</span></h2><p class="more multi">';
			while ($rows = mysql_fetch_object($allmatches))
			{
				$id = $rows->id;
				$periodo = $rows->periodo;
				$item = $rows->item;
				$tipo_ocorrencia = $rows->tipo_ocorrencia;
				$ocorrencia = $rows->ocorrencia;
				$obs = $rows->obs;
				$fonte = $rows->fonte;
				$link = $rows->link;
				$data_capital = $rows->data_capital;
				$data_grandesp = $rows->data_grandesp;
				$data_interior = $rows->data_interior;
				$data_deinter1 = $rows->data_deinter1;
				$data_deinter2 = $rows->data_deinter2;
				$data_deinter3 = $rows->data_deinter3;
				$data_deinter4 = $rows->data_deinter4;
				$data_deinter5 = $rows->data_deinter5;
				$data_deinter6 = $rows->data_deinter6;
				$data_deinter7 = $rows->data_deinter7;
				$data_deinter8 = $rows->data_deinter8;
				$data_deinter9 = $rows->data_deinter9;
				$data_estado = $rows->data_estado;
				echo '<span>Ocorrência: </span><a href="http://montanheiro.com.br/labs/macondo/entradas.php?id='.$id.'">'.$ocorrencia.'</a><br>';
			}
				echo '
			</p>
          </div>
        </div>
      </div>
    </div>
  </div>';
  include ('includes/footer.inc');
  echo '  
</body>
</html>';
?>
