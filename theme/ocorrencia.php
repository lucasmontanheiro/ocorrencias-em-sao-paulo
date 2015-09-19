<?php 
include ('theme/database.php');
include ('theme/functions.php');
$id_cr = $_GET['cr'];
include ('includes/crime_name.inc');
include ('includes/header.inc');
include ('includes/sidebar1.inc');

echo '<div class="wrapper">';
echo '	<div id="capital_block">
			<div id="crimeheader"><h2>';

			crime($id_cr);

			echo '</h2>
				<div id="crimedesc">';

CrimeDescription($id_cr);

echo '			
				</div>
			</div>
			<div id="main_content">
			<div id="news_block">
				<span class="date">Breve Análise</span><br/>
				<div id="news_item">';
				CrimeAnalise($id_cr);

echo '</div></div>
<div id="news_block2">';
				
echo '<h4 id="crime_sidebar">Ocorrências na Capital (por ano)</h4>
<img width="11" height="11" src="'.$url.'/images/blue_graph.JPG"> Ano incompleto </br>';
Grafico("Capital", $chart_title, '1', $id_cr);

echo '<h4 id="crime_sidebar">Ocorrências no Interior de São Paulo (por ano)</h4>
<img width="11" height="11" src="'.$url.'/images/blue_graph.JPG"> Ano incompleto </br>';
Grafico("Interior", $chart_title, '3', $id_cr);

echo '<h4 id="crime_sidebar">Ocorrências no Estado de São Paulo (por ano)</h4>
<img width="11" height="11" src="'.$url.'/images/blue_graph.JPG"> Ano incompleto </br>';
Grafico("Estado", $chart_title, '13', $id_cr);

echo '</div><div id="news_block2">';
echo '
<div id="mapp">'; 

echo $crime_label.'<br>';

if ( $cr == 'Tentativa de homicídio') { echo '<h5>Estatísticas na cidade de São Paulo</h5><strong>Taxa de homicídios e tentativas de homicídios<br>(ocorrências por 100 mil habitantes)</strong><br>'; MAP_CITY($id_cr); }
elseif ( $cr == 'Lesão corporal dolosa') { echo '<h5>Estatísticas na cidade de São Paulo</h5><strong>Taxa de Lesão Corporal Dolosa<br>(ocorrências por 100 mil habitantes)</strong>'; MAP_CITY(46); }
elseif ( $cr == 'Homicídio doloso') { echo '<h5>Estatísticas na cidade de São Paulo</h5><strong>Taxa de homicídios de homens de 15 a 29 anos<br>(ocorrências por 100 mil habitantes nesta faixa etária)</strong>'; MAP_CITY(41); }
elseif ( $cr == 'Pessoas mortas em confronto com a polícia militar em serviço') { echo '<h5>Estatísticas na cidade de São Paulo</h5>Mortes por ação policial (%)'; MAP_CITY(35); }
else { echo ''; }

echo '
<h4>Estatísticas no Estado de São Paulo</h4>

<img src="images/mapa_estado_sp.gif" usemap="#estadosp" width="410" border="0" />
<map name="estadosp" id="estadosp">
<div id="d8"><area shape="poly" alt="Deinter 8" title="" coords="1,144,38,117,51,95,43,86,53,89,56,69,59,66,106,89,97,108,107,111,105,130,98,148,82,143,59,143,49,135,41,139,44,144,25,143" target="" /></div>
<div id="d5"><area shape="poly" alt="Deinter 5" title="" coords="96,12,90,28,77,32,66,49,68,61,60,63,117,94,138,89,151,72,178,91,181,79,192,76,198,78,199,65,182,50,175,35,182,29,180,23,175,27,171,21,171,11,152,10,136,7,124,6,117,2,108,11"   target="" /></div>
<div id="d3"><area shape="poly" alt="Deinter 3" title="" coords="255,8,266,21,266,32,274,42,266,52,274,67,259,89,265,95,249,106,219,115,212,106,197,99,193,101,180,91,183,82,201,79,205,67,185,48,179,36,186,29,182,24,183,17,187,21,187,28,193,31,193,27,189,22,194,17,206,18,206,16,220,17,221,11,228,17,232,14,240,14,242,8,249,11"   target="" /></div>
<div id="d9"><area shape="poly" alt="Deinter 9" title="" coords="299,79,288,75,283,79,279,78,277,69,263,89,267,97,253,109,249,114,222,117,225,135,232,136,235,151,241,148,251,153,252,157,263,163,267,158,270,142,275,138,275,130,273,127,275,122,269,123,264,118,275,106,282,113,287,109,286,118,294,119,297,110,295,93,303,84"   target="" /></div>
<div id="d2"><area shape="poly" alt="Deinter 2" title="" coords="322,151,308,152,306,133,293,121,285,120,285,113,281,116,275,108,266,117,269,121,277,121,275,128,276,138,271,142,268,159,272,165,277,164,273,170,275,172,295,166,303,165,308,168"   target="" /></div>
<div id="d1"><area shape="poly" alt="Deinter 1" title="" coords="408,138,386,137,386,133,382,128,366,132,353,141,351,136,347,139,340,135,335,141,339,140,341,144,324,151,315,163,330,179,337,177,341,185,335,192,354,196,351,201,362,199,359,191,353,193,353,186,376,171,378,174,383,174,376,163,381,153,390,149,398,147,405,145"   target="" /></div>
<div id="dc"><area shape="poly" alt="Decap e Demacro" title="" coords="274,203,284,193,280,187,283,180,280,173,303,167,311,171,314,165,331,182,336,178,339,186,335,189,331,185,326,189,308,193,296,202,290,199,283,206"   target="" /></div>
<div id="d6"><area shape="poly" alt="Deinter 6" title="" coords="213,258,215,242,222,222,242,209,244,215,251,209,274,204,286,208,290,201,296,204,310,194,333,188,334,191,322,195,314,205,312,199,309,199,307,203,309,207,299,208,280,220,280,225,263,237,248,249,241,256,241,262,233,266,226,253,223,257,219,253"   target="" /></div>
<div id="d7"><area shape="poly" alt="Deinter 7" title="" coords="162,172,164,201,182,225,177,240,215,240,221,218,242,207,246,213,251,207,273,203,279,195,276,186,281,180,280,175,274,178,271,167,267,161,263,165,250,158,249,154,241,151,234,152,229,138,220,138,214,136,209,138,206,137,205,144,198,151,188,150,184,143,178,147,175,147,175,153,178,155,173,160,163,173,161,171"   target="" /></div>
<div id="d4"><area shape="poly" alt="Deinter 4" title="" coords="108,157,107,150,101,148,108,129,111,111,100,106,108,90,116,96,137,94,152,75,194,104,198,101,212,110,219,120,224,136,214,135,206,137,204,134,203,144,198,149,190,148,184,140,177,146,172,147,175,156,161,171,156,162,144,152,137,155,126,153,118,156,115,154"   target="" /></div>
</map>
<script type="text/javascript">
		$(\'#d8\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 8</strong><br>Municípios: Adamantina, Dracena, Presidente Prudente e Presidente Venceslau<br> ';
					Grafico("Deinter8", $chart_title, '11', $id_cr); echo ' \',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
			target: \'mouse\',
			adjust: { mouse: true }
		}
	});

		$(\'#d5\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 5</strong><br>Municípios: Andradina, Araçatuba, Catanduva, Fernandópolis, Jales, Novo Horizonte, São José do Rio Preto e Votuporanga';
					Grafico("Deinter5", $chart_title, '8', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });

		$(\'#d3\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 3</strong><br>Municípios: Araraquara, Barretos, Bebedouro, Franca, Ribeirão Preto, São Carlos, São Joaquim da Barra, Sertãozinho';
					Grafico("Deinter3", $chart_title, '6', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
   
   		$(\'#d9\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 9</strong><br>Municípios: Americana, Casa Branca, Limeira, Piracicaba, Rio Claro e São João da Boa Vista';
					Grafico("Deinter9", $chart_title, '12', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });

      $(\'#d2\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 2</strong><br>Municípios: Bragança Paulista, Campinas, Jundiaí e Mogi Guaçu';
					Grafico("Deinter2", $chart_title, '5', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
   
   		$(\'#d1\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 1</strong><br>Municípios: Cruzeiro, Guaratinguetá, Jacareí, São Sebastião, São José dos Campos e Taubaté';
					Grafico("Deinter1", $chart_title, '4', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
   
   		$(\'#dc\').qtip(
   {
      	content: \'	<strong>Ocorrências na Grande São Paulo</strong><br>Municípios: Confirmar';
					Grafico("Grande SP", $chart_title, '2', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
 
   		$(\'#d6\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 6</strong><br>Municípios: Itanhaém, Jacupiranga, Registro e Santos';
					Grafico("Deinter6", $chart_title, '9', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
   
   		$(\'#d7\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 7</strong><br>Municípios: Avaré, Botucatu, Itapetininga, Itapeva e Sorocaba';
					Grafico("Deinter7", $chart_title, '10', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
   
   		$(\'#d4\').qtip(
   {
      	content: \'	<strong>Ocorrências no Deinter 4</strong><br>Municípios: Assis, Bauru, Jaú, Lins, Marília, Ourinhos e Tupã';
					Grafico("Deinter4", $chart_title, '7', $id_cr); echo '\',
		show: \'mouseover\',
   		hide: \'mouseout\',
		position: {
		   target: \'mouse\',
		   adjust: { mouse: true }
		}
   });
</script>
</div></center>
			</div>
			
			<div id="news_block">
			  <span class="date">Reportagens/Notícias</span>
				<br/>';
				CrimeLinks($id_cr,'1');
				echo '
			</div>
				<br>';
echo '</div>';
echo '<div id="main_extra">';
echo '<h3>Dados da Capital</h3>';
echo '<h4 id="crime_sidebar">Evolução anual:</h4>';
echo '
<div>
	<ul>
		<li>De 2005 para 2006: ';YoY('1', $id_cr, 2005, 2006);
		echo '</li><li>De 2006 para 2007: ';YoY('1', $id_cr, 2006, 2007);
		echo '</li><li>De 2007 para 2008: ';YoY('1', $id_cr, 2007, 2008);
echo '</li></ul>
</div>';



echo '<h4 id="crime_sidebar">Sazonalidade (por trimestre)</h4>';

AoLongoDoAno('Ao Longo do Ano', 'Estatística por trimestre', '1', $id_cr);

echo '<h3>Dados do Estado</h3>';
echo '<h4 id="crime_sidebar">Proporção de registros, por região</h4>';

GraficoPizza($id_cr);

echo '</div></div>';
echo '</div></div></div></div></div>';
include ('includes/footer.inc');
?>
