<?php

echo '
<div id="sidebar">
	<ul>
		<h4>Crimes</h4>
		
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=1">Contra a pessoa</a></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=2">Contra o patrimonio</a></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=3">Contra os costumes</a></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=5">Contravencionais</a></li>
	       <li class="sidebar_item"><strong><a href="'.$url.'/ocorrencia.php?cr=4">Entorpecentes</a></strong></li>
	       <li class="sidebar_item"><strong><a href="'.$url.'/ocorrencia.php?cr=51">Estupro</a></strong></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=52">Extorsão mediante seqüestro </a></li>
	       <li class="sidebar_item"><strong><a href="'.$url.'/ocorrencia.php?cr=58">Furto - outros </a></li></strong>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=59">Furto de veículos </a></li>
	       <li class="sidebar_item"><strong><a href="'.$url.'/ocorrencia.php?cr=44">Homicídio Culposo</a></strong></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=43">Homicídio culposo por Acidente de Trânsito </a></li>
	       <li class="sidebar_item"><strong><a href="'.$url.'/ocorrencia.php?cr=41">Homicídio Doloso</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=42">Vítimas de Homicídio Doloso</a>)</li>
	       <li class="sidebar_item"><strong><a href="'.$url.'/ocorrencia.php?cr=49">Latrocínio</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=50">Vítimas de Latrocínio</a>)</li>
	       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=48">Lesão corporal culposa (outras) </a></strong></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=47">Lesão corporal culposa por Acidente de Trânsito </a></li>
	       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=46">Lesão corporal dolosa </a></strong></li>
	       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=54">Roubo - outros</a></strong></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=56">Roubo a Banco </a></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=57">Roubo de Carga </a></li>
	       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=55">Roubo de veículos </a></strong></li>
	       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=45">Tentativa de homicídio </a></strong></li>
	       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=53">Tráfico de entorpecentes </a></li>

		<h4>Atividades de polícia judiciária</h4>
		
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=10">Total de boletins de ocorrência </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=13">Total de inquéritos instaurados </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=11">Total de termos circunstanciados lavrados pela Polícia Civil</a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=12">Total de termos circunstanciados lavrados pela Polícia Militar</a></li>

		<h4>Atividades policiais</h4>
		
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=27">Armas de fogo apreendidas </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=">Laudos Clínicos Laboratoriais Expedidos - IML </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=">Laudos Necroscópicos Expedidos - IML </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=">Laudos Periciais Expedidos - IC</a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=23">Nº de autos de apreensão (art 173 ECA) </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=24">Nº de infratores apreendidos em flagrante </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=25">Nº de infratores apreendidos por mandado </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=21">Nº de pessoas presas em flagrante </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=26">Nº de revistas pessoais/ identificação </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=28">Nº de Veículos Recuperados </a></li>
			<!--<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=20">Prisões efetuadas (em flagrante + por mandado) </a></li>-->
		
		<h4>Casos envolvendo policiais militares</h4>
		
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=37">Pessoas feridas em confronto com a polícia militar em serviço </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=38">Pessoas feridas por policiais militares de folga </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=35">Pessoas mortas em confronto com a polícia militar em serviço</a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=36">Pessoas mortas por policiais militares de folga</a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=40">Policiais militares feridos em serviço </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=39">Policiais militares mortos em serviço </a></li>
		
		<h4>Casos envolvendo policiais civis</h4>

			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=16">Pessoas feridas em confronto com a polícia civil em serviço </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=17">Pessoas feridas por policiais civis de folga </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=14">Pessoas mortas em confronto com a polícia civil em serviço </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=15">Pessoas mortas por policiais civis de folga</a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=19">Policiais civis feridos em serviço </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=18">Policiais civis mortos em serviço </a></li>

		<h4>Outros</h4>
		
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=">Exames Clínicos Laboratoriais Realizados - IML </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=">Exames Necroscópicos Realizados - IML </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=">Exames Periciais Realizados - IC </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=9">Não Criminais </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=22">Nº de pessoas presas por mandado </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=6">Outros criminais (não inclui contravenções) </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=7">Total de Crimes Violentos ( Hom.Doloso, Roubo, Latrocínio, Estupro e EMS) </a></li>
			<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=8">Total de delitos </a></li>
	</ul>
</div>';

?>