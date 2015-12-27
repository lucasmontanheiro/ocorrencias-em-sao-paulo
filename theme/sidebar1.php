<?php

echo '
<div class="col-lg-3">
	<ul>
		<h3>Crimes</h3>
		
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=1&region=data_capital">Contra a pessoa</a></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=2&region=data_capital">Contra o patrimonio</a></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=3&region=data_capital">Contra os costumes</a></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=5&region=data_capital">Contravencionais</a></li>
	       <li class=""><strong><a href="'.$url.'/ocorrencia.php?cr=4&region=data_capital">Entorpecentes</a></strong></li>
	       <li class=""><strong><a href="'.$url.'/ocorrencia.php?cr=51&region=data_capital">Estupro</a></strong></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=52&region=data_capital">Extorsão mediante seqüestro </a></li>
	       <li class=""><strong><a href="'.$url.'/ocorrencia.php?cr=58&region=data_capital">Furto - outros </a></li></strong>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=59&region=data_capital">Furto de veículos </a></li>
	       <li class=""><strong><a href="'.$url.'/ocorrencia.php?cr=44&region=data_capital">Homicídio Culposo</a></strong></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=43&region=data_capital">Homicídio culposo por Acidente de Trânsito </a></li>
	       <li class=""><strong><a href="'.$url.'/ocorrencia.php?cr=41&region=data_capital">Homicídio Doloso</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=42&region=data_capital">Vítimas de Homicídio Doloso</a>)</li>
	       <li class=""><strong><a href="'.$url.'/ocorrencia.php?cr=49&region=data_capital">Latrocínio</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=50&region=data_capital">Vítimas de Latrocínio</a>)</li>
	       <strong><li class=""><a href="'.$url.'/ocorrencia.php?cr=48&region=data_capital">Lesão corporal culposa (outras) </a></strong></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=47&region=data_capital">Lesão corporal culposa por Acidente de Trânsito </a></li>
	       <strong><li class=""><a href="'.$url.'/ocorrencia.php?cr=46&region=data_capital">Lesão corporal dolosa </a></strong></li>
	       <strong><li class=""><a href="'.$url.'/ocorrencia.php?cr=54&region=data_capital">Roubo - outros</a></strong></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=56&region=data_capital">Roubo a Banco </a></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=57&region=data_capital">Roubo de Carga </a></li>
	       <strong><li class=""><a href="'.$url.'/ocorrencia.php?cr=55&region=data_capital">Roubo de veículos </a></strong></li>
	       <strong><li class=""><a href="'.$url.'/ocorrencia.php?cr=45&region=data_capital">Tentativa de homicídio </a></strong></li>
	       <li class=""><a href="'.$url.'/ocorrencia.php?cr=53&region=data_capital">Tráfico de entorpecentes </a></li>

		<h3>Atividades de polícia judiciária</h3>
		
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=10&region=data_capital">Total de boletins de ocorrência </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=13&region=data_capital">Total de inquéritos instaurados </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=11&region=data_capital">Total de termos circunstanciados lavrados pela Polícia Civil</a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=12&region=data_capital">Total de termos circunstanciados lavrados pela Polícia Militar</a></li>

		<h3>Atividades policiais</h3>
		
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=27&region=data_capital">Armas de fogo apreendidas </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=&region=data_capital">Laudos Clínicos Laboratoriais Expedidos - IML </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=&region=data_capital">Laudos Necroscópicos Expedidos - IML </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=&region=data_capital">Laudos Periciais Expedidos - IC</a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=23&region=data_capital">Nº de autos de apreensão (art 173 ECA) </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=24&region=data_capital">Nº de infratores apreendidos em flagrante </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=25&region=data_capital">Nº de infratores apreendidos por mandado </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=21&region=data_capital">Nº de pessoas presas em flagrante </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=26&region=data_capital">Nº de revistas pessoais/ identificação </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=28&region=data_capital">Nº de Veículos Recuperados </a></li>
			<!--<li class=""><a href="'.$url.'/ocorrencia.php?cr=20&region=data_capital">Prisões efetuadas (em flagrante + por mandado) </a></li>-->
		
		<h3>Casos envolvendo policiais militares</h3>
		
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=37&region=data_capital">Pessoas feridas em confronto com a polícia militar em serviço </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=38&region=data_capital">Pessoas feridas por policiais militares de folga </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=35&region=data_capital">Pessoas mortas em confronto com a polícia militar em serviço</a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=36&region=data_capital">Pessoas mortas por policiais militares de folga</a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=40&region=data_capital">Policiais militares feridos em serviço </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=39&region=data_capital">Policiais militares mortos em serviço </a></li>
		
		<h3>Casos envolvendo policiais civis</h3>

			<li class=""><a href="'.$url.'/ocorrencia.php?cr=16&region=data_capital">Pessoas feridas em confronto com a polícia civil em serviço </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=17&region=data_capital">Pessoas feridas por policiais civis de folga </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=14&region=data_capital">Pessoas mortas em confronto com a polícia civil em serviço </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=15&region=data_capital">Pessoas mortas por policiais civis de folga</a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=19&region=data_capital">Policiais civis feridos em serviço </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=18&region=data_capital">Policiais civis mortos em serviço </a></li>

		<h3>Outros</h3>
		
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=&region=data_capital">Exames Clínicos Laboratoriais Realizados - IML </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=&region=data_capital">Exames Necroscópicos Realizados - IML </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=&region=data_capital">Exames Periciais Realizados - IC </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=9&region=data_capital">Não Criminais </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=22&region=data_capital">Nº de pessoas presas por mandado </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=6&region=data_capital">Outros criminais (não inclui contravenções) </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=7&region=data_capital">Total de Crimes Violentos ( Hom.Doloso, Roubo, Latrocínio, Estupro e EMS) </a></li>
			<li class=""><a href="'.$url.'/ocorrencia.php?cr=8&region=data_capital">Total de delitos </a></li>
	</ul>
</div>';

?>