<?php

function column_graph($graph_title , $chart_title, $crime_code, $region) {

	$allmatches = mysql_query("SELECT 
		periodo_year,
		periodo_quarter, 
		".$region." AS region
		FROM table_macondo 
		WHERE ocorrencia=$crime_code
		GROUP BY periodo_year
		ORDER BY periodo_year ASC" )
	or die (mysql_error());

	$i = 0;
	
	while ($rows = mysql_fetch_object($allmatches))
	{
		$info[$i] = array (
			"year" => $rows->periodo_year,
			"quarter" => $rows->periodo_quarter,
			"region" => $rows->region
			);
		$i++;
	}



echo '    
	
	<script type="text/javascript">
      	google.load("visualization", "1.1", {packages:["bar"]});
      	google.setOnLoadCallback(drawStuff);

      	function drawStuff() {
        var data = new google.visualization.arrayToDataTable([

			[\'Ano\', \'Ocorrências\'],
        	';
          
          	for ( $j=0; ($j<$i) ; $j++ ) {
					
				echo '["'.$info[$j]["year"].'", '.$info[$j]["region"].'],';
					
				}

echo '
        ]);

        var options = {
          width: 750,
          legend: { position: \'none\' },
          axes: {
            x: {
              0: { side: \'top\', label: \'Ano\'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById("top_x_div_'.$region.'"));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>';

echo '<div id="top_x_div_'.$region.'" style="width: 900px; height: 300px;"></div>';

}



//FUNCTIONS

function stripAccents($string){
return strtr($string,' ï¿½ï¿½aaaceeeeï¿½iiinï¿½ooooï¿½uuuyyAAAAACï¿½EEEIIIINOOOOOUUUUYï¿½',
 '+aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUYc ');
 }

/* 	FUNCTION YEAR OVER YEAR ATUALIZADA
*/

function YoY( $data_graph2, $cr, $ant, $pos ) {

			$allmatches = mysql_query("SELECT substr(periodo_year,1,4) AS periodo, 
										sum(data_capital) AS data_capital, 
										sum(data_grandesp) AS data_grandesp, 
										sum(data_interior) AS data_interior, 
										sum(data_deinter1) AS data_deinter1, 
										sum(data_deinter2) AS data_deinter2, 
										sum(data_deinter3) AS data_deinter3, 
										sum(data_deinter4) AS data_deinter4, 
										sum(data_deinter5) AS data_deinter5, 
										sum(data_deinter6) AS data_deinter6, 
										sum(data_deinter7) AS data_deinter7, 
										sum(data_deinter8) AS data_deinter8, 
										sum(data_deinter9) AS data_deinter9, 
										sum(data_estado) AS data_estado
											FROM table_macondo 
											WHERE ocorrencia='$cr' 
											GROUP BY substr(periodo_year,1,4) 
											ORDER BY periodo ASC")
			or die (mysql_error());

			$i = 2005;
			$count = 1;
			while ($rows = mysql_fetch_object($allmatches))
			{
				$data_graph2 = array('empty', 
										$rows->data_capital,
										$rows->data_grandesp,
										$rows->data_interior,
										$rows->data_deinter1,
										$rows->data_deinter2,
										$rows->data_deinter3,
										$rows->data_deinter4,
										$rows->data_deinter5,
										$rows->data_deinter6,
										$rows->data_deinter7,
										$rows->data_deinter8,
										$rows->data_deinter9,
										$rows->data_estado);
				$data_graph[$i] = $data_graph2[$count];
				$i++;
			}

$yoy = (100*$data_graph[$pos])/($data_graph[$ant]);
$yoy2 = 100 - $yoy;
$yoy2 = number_format($yoy2 , 2, ',', '');

// checando se o numero eh <> e escolhendo a cor da flecha
if ((100 - $yoy)>= 1) { echo '-'.$yoy2.'% <img src="images/down_blue.gif">'; }
else { echo '+'.(-1)*$yoy2.'% <img src="images/up_red.gif">'; }

}

/*
***********************************
FUNCTION AO LONGO DO ANO ATUALIZADA 
*********************************** 
*/

function AoLongoDoAno( $title_graph , $chart_title, $data_graph2, $cr ) {

			$allmatches = mysql_query("SELECT * FROM table_macondo WHERE ocorrencia='$cr' ORDER BY periodo ASC")
			or die (mysql_error());
			$i = 0;
			while ($rows = mysql_fetch_object($allmatches))
			{
				$i++;
				$data_graph3 = array('empty',
									$rows->data_capital,
									$rows->data_grandesp,
									$rows->data_interior,
									$rows->data_deinter1,
									$rows->data_deinter2,
									$rows->data_deinter3,
									$rows->data_deinter4,
									$rows->data_deinter5,
									$rows->data_deinter6,
									$rows->data_deinter7,
									$rows->data_deinter8,
									$rows->data_deinter9,
									$rows->data_estado);

				$data_graph[$i] = $data_graph3[$data_graph2];
			}

	$series = array($data_graph[1],$data_graph[2],$data_graph[3],$data_graph[4],$data_graph[5],$data_graph[6],$data_graph[7],$data_graph[8],
	$data_graph[9],$data_graph[10],$data_graph[11],$data_graph[12],	$data_graph[13],$data_graph[14],$data_graph[15],$data_graph[16],
	$data_graph[17],$data_graph[18],$data_graph[19]);
	sort($series);
	$graph_range = $series[sizeof($series)-1];
	$min_range = $series[0];

	$i = 5;

echo '
<img src="http://chart.apis.google.com/chart?
chs=300x125
&amp;chbh=30,10
&amp;chco=76A4FB
&amp;chxt=x,y,r
&amp;chds='.$min_range.','.$graph_range.'
&amp;chd=t:';
				echo $data_graph[1].','.$data_graph[2].','.$data_graph[3].','.$data_graph[4].','.$data_graph[5].'|';
				echo $data_graph[5].','.$data_graph[6].','.$data_graph[7].','.$data_graph[8].','.$data_graph[9].'|';
				echo $data_graph[9].','.$data_graph[10].','.$data_graph[11].','.$data_graph[12].','.$data_graph[13].'|';
				echo $data_graph[13].','.$data_graph[14].','.$data_graph[15].','.$data_graph[16].','.$data_graph[17].'|';
				echo $data_graph[17].','.$data_graph[18].','.$data_graph[19].','.$data_graph[20].','.$data_graph[21];
				echo '
&amp;cht=lc
&amp;chdl=2005|2006|2007|2008|2009
&amp;chco=FF0000,00FF00,0000FF,000000,76A4FB
&amp;chxl=0:|1o%20trim|2o%20trim|3o%20trim|4o%20trim|1o%20trim"alt="Capital" />';
}


/*
***********************************
FUNCTION GRAFICO PIZZA ATUALIZADA 
*********************************** 
*/

function GraficoPizza($cr) {
			$grafico_entradas = mysql_query("SELECT * FROM table_macondo WHERE ocorrencia='$cr' ORDER BY periodo ASC")
			or die (mysql_error());
			
			$i = 0;
			
			while ($rows = mysql_fetch_object($grafico_entradas))
			{
				$i++;
				$data_capital = $rows->data_capital;
				$data_grandesp = $rows->data_grandesp;
				$data_interior = $rows->data_interior;
				$data_estado = $rows->data_estado;
			}

$porc_capital = $data_capital*100/$data_estado;
$porc_grandesp = $data_grandesp*100/$data_estado;
$porc_interior = $data_interior*100/$data_estado;

$porc_cap1 = number_format($porc_capital , 2, ',', '');
$porc_gsp1 = number_format($porc_grandesp , 2, ',', '');
$porc_int1 = number_format($porc_interior , 2, ',', '');

echo '<img src="http://chart.apis.google.com/chart?
chs=300x100
&amp;chd=t:'.$porc_capital.','.$porc_grandesp.','.$porc_interior;
echo '
&amp;cht=p
&amp;chl=Capital ('.$porc_cap1.'%)|GrandeSP ('.$porc_gsp1.'%)|Interior ('.$porc_int1.'%)" alt="x" />';
}

function CrimeLinks($id_cr , $cap_int) {

$loadcrimedesc = mysql_query("SELECT * FROM table_macondo_links WHERE (id_crime='$id_cr' AND cap_int='$cap_int') ORDER BY data DESC")
			or die (mysql_error());

			$count = 0;
			while ($rowsfilter = mysql_fetch_object($loadcrimedesc))
			{
				$count++;
				$label[$count] = $rowsfilter->label_link;
				$link[$count] = $rowsfilter->url_link;
				$author[$count] = $rowsfilter->author;
				$data[$count] = $rowsfilter->data;
			}
if ($count == 0) { echo '<div id="news_item">Não há notícias registradas até o momento para esta ocorrência.</div>'; }
for ($i=1 ; $i<=$count ; $i++) {
echo '<div id="news_item">';
echo '<a href="'.$link[$i].'">';
echo $label[$i];
echo '</a> | <span class="author">';
echo $author[$i];
echo '</span> | <span class="date">';
			$ano = str_split($data[$i], 4);
			$mes = str_split($ano[1], 2);
			$dia = $mes[1];
echo $dia.'/'.$mes[0].'/'.$ano[0];
echo '</span></div>';
}
}

function CrimeAnalise($id_cr) {

$loadcrimedesc = mysql_query("SELECT * FROM ocorrencias_analises WHERE id_crime='$id_cr'")
			or die (mysql_error());

			while ($rowsfilter = mysql_fetch_object($loadcrimedesc))
			{
				$analise = $rowsfilter->analise;
			}
if ($analise == NULL) { echo 'Não há análises registradas até o momento para esta ocorrência.'; }
else { echo $analise; }
}

function MAP_CITY( $id_cr ) {

include ('includes/sp_city_map.inc');

$spstatsfilter = mysql_query("SELECT regiao FROM table_macondo_sp WHERE crime='$id_cr' GROUP BY regiao") or die (mysql_error());

			$fetch = 0;
			while ($rowsfilter = mysql_fetch_object($spstatsfilter))
			{
				$fetch++;
				$regioes[$fetch] = $rowsfilter->regiao;
			}
echo '<script type="text/javascript">';
			for ( $num = 1; $num <= $fetch; $num++ ) 
			{
			$regioes2 = $regioes[$num];
				$spstats = mysql_query("SELECT * FROM table_macondo_sp WHERE crime='$id_cr' AND regiao='$regioes2' ORDER BY ano ASC") or die (mysql_error());
				$i = 0;
				global $crime_description;
				while ($rows = mysql_fetch_object($spstats))
				{
					$i++;
					$sp_ano[$i] = $rows->ano;
					$sp_crime_desc[$i] = $rows->crime_desc;
					$sp_taxa[$i] = $rows->taxa;
				}
$sp = $num;	
$crime_description = $sp_crime_desc[1];
echo '
$(\'#bairro'.$sp.'\').qtip(
	{
      	content: \'<strong>'.$regioes2.'</strong><br>';
			for ($ano = 1; $ano <= $i; $ano++ ) 
			{
			echo $sp_ano[$ano].': '.$sp_taxa[$ano];
			echo '<br>';
			}
echo 	'\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
			target: \'mouse\',
			adjust: { mouse: true }
		}
	});
';
			}
echo '</script>';

}

function listLinks($year, $crime_code){

$alllinks = mysql_query("SELECT * FROM ocorrencias_links WHERE year='$year' AND id_crime='$crime_code'")
			or die (mysql_error());

			while ($links = mysql_fetch_object($alllinks))
			{
				$analise = "<a href='".$links->url_link."'>".$links->label_link."</a>";
			}

if ($analise == NULL) { echo 'Não há links.'; }
else { echo $analise; }	

}


?>