<?php

//FUNCTIONS

function stripAccents($string){
return strtr($string,' ï¿½ï¿½aaaceeeeï¿½iiinï¿½ooooï¿½uuuyyAAAAACï¿½EEEIIIINOOOOOUUUUYï¿½',
 '+aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUYc ');
 }
 
function Grafico($title_graph , $chart_title, $data_graph2, $cr ) {

	$allmatches = mysql_query("SELECT substr(periodo,1,4) AS periodo, 
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
					WHERE ocorrencia=$cr 
					GROUP BY substr(periodo,1,4) 
					ORDER BY periodo ASC") 
		or die (mysql_error());

			$i = 0;
			
			while ($rows = mysql_fetch_object($allmatches))
			{
			$dados = array(	$rows->data_capital,
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
				$i++;
				$data_graph_year[$i] = $dados[$data_graph2 - 1];
			}

			// This portion is all about the range of the graphs
			$series = array(
					$data_graph_year[0], 
					$data_graph_year[1], 
					$data_graph_year[2], 
					$data_graph_year[3], 
					$data_graph_year[4],
					$data_graph_year[5],
					);
			sort($series);
			$graph_range = $series[sizeof($series)-1];

			echo $graph_range;

$i = 5;

echo '<img src="http://chart.apis.google.com/chart?chs=300x125&chbh=30,10';
echo '&chco=76A4FB|76A4FB|76A4FB|76A4FB|76A4FB|224499&chxt=x,y,r,x&chds=0,'.$graph_range.'&chd=t:';
				for ( $j=1; ($j<=$i) ; $j++ ) {
				echo $data_graph_year[$j];
				if ($j<=($i-1)) {
				echo ',';
				}
				}	
				echo 
'&cht=bvs&chxl=0:|2005|2006|2007|2008|2009|2010|3:|';
				for ( $j=1; ($j<=$i) ; $j++ ) {
				echo $data_graph_year[$j];
				if ($j!=$i) {
				echo '|';
				}
				}
echo '" alt="Capital" />';

				for ( $j=1; ($j<=$i) ; $j++ ) {
				echo $data_graph_year[$j];
				if ($j<=($i-1)) {
				echo ',';
					}
				}	

}

/* 	FUNCTION YEAR OVER YEAR ATUALIZADA
*/

function YoY( $data_graph2, $cr, $ant, $pos ) {

			$allmatches = mysql_query("SELECT substr(periodo,1,4) AS periodo, 
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
											GROUP BY substr(periodo,1,4) 
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

function crime($info, $id_cr) {

	$crimes = mysql_query("SELECT * FROM table_macondo_crimes WHERE num_crime='$id_cr'")
		or die (mysql_error());

	while ($rows = mysql_fetch_object($crimes))
		{
			$crime_id = $rows->id;
			$crime_code = $rows->crime_num_crime;
			$crime_name = $rows->crime;
			$crime_source = $rows->fonte;
			$crime_definition = $rows->def_crime;
			$crime_item = $rows->item_crime;
		}

		switch ($info) {
    case 'id':
        return $crime_id;
        break;
    case 'code':
        return $crime_code;
        break;
    case 'name':
        return $crime_name;
        break;
    case 'source':
        return $crime_source;
        break;
    case 'definition':
        return $crime_definition;
        break;
    case 'item':
        return $crime_item;
        break;
	}

}


function CrimeDescription($id_cr) {

$loadcrimedesc = mysql_query("SELECT * FROM table_macondo_crimes WHERE num_crime='$id_cr'")
			or die (mysql_error());

			$count = 0;
			while ($rowsfilter = mysql_fetch_object($loadcrimedesc))
			{
				$count++;
				$crimedescription = $rowsfilter->def_crime;
			}
echo $crimedescription;
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

$loadcrimedesc = mysql_query("SELECT * FROM table_macondo_analises WHERE id_crime='$id_cr'")
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

?>