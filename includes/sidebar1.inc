<?php
include ('theme/database.php');
echo '<div id="sidebar">
<ul>
	<h4>Crimes</h4>
	
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=1">Contra a pessoa </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contra o patrimonio ">Contra o patrimonio </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contra os costumes ">Contra os costumes </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contravencionais ">Contravencionais </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Entorpecentes ">Entorpecentes </a></strong></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Estupro ">Estupro </a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Extorsão mediante seqüestro ">Extorsão mediante seqüestro </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Furto - outros ">Furto - outros </a></li></strong>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Furto de veículos ">Furto de veículos </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Homicídio Culposo ">Homicídio Culposo</a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Homicídio culposo por Acidente de Trânsito ">Homicídio culposo por Acidente de Trânsito </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Homicídio doloso ">Homicídio Doloso</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=Nº de Vítimas em Homicídio Doloso ">Vítimas de Homicídio Doloso</a>)</li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Latrocínio ">Latrocínio</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=Nº de Vítimas de Latrocínio ">Vítimas de Latrocínio</a>)</li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Lesão corporal culposa outras ">Lesão corporal culposa (outras) </a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Lesão corporal culposa por Acidente de Trânsito ">Lesão corporal culposa por Acidente de Trânsito </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Lesão corporal dolosa ">Lesão corporal dolosa </a></strong></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo - outros">Roubo - outros</a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo a Banco ">Roubo a Banco </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo de Carga ">Roubo de Carga </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo de veículos ">Roubo de veículos </a></strong></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Tentativa de homicídio ">Tentativa de homicídio </a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Tráfico de entorpecentes ">Tráfico de entorpecentes </a></li>

	<h4>Atividades de polícia judiciária</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de boletins de ocorrência ">Total de boletins de ocorrência </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de inquéritos instaurados ">Total de inquéritos instaurados </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de termos circunstanciados lavrados pela Polícia Civil">Total de termos circunstanciados lavrados pela Polícia Civil</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de termos circunstanciados lavrados pela Polícia Militar">Total de termos circunstanciados lavrados pela Polícia Militar</a></li>

	<h4>Atividades policiais</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Armas de fogo apreendidas ">Armas de fogo apreendidas </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Laudos Clínicos Laboratoriais Expedidos - IML ">Laudos Clínicos Laboratoriais Expedidos - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Laudos Necroscópicos Expedidos - IML ">Laudos Necroscópicos Expedidos - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Laudos Periciais Expedidos - IC">Laudos Periciais Expedidos - IC</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de autos de apreensão (art 173 ECA) ">Nº de autos de apreensão (art 173 ECA) </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de infratores apreendidos em flagrante ">Nº de infratores apreendidos em flagrante </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de infratores apreendidos por mandado ">Nº de infratores apreendidos por mandado </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de pessoas presas em flagrante ">Nº de pessoas presas em flagrante </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de revistas pessoais/ identificação ">Nº de revistas pessoais/ identificação </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de Veículos Recuperados ">Nº de Veículos Recuperados </a></li>
		<!--<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Prisões efetuadas (em flagrante+ por mandado) ">Prisões efetuadas (em flagrante+ por mandado) </a></li>-->
	
	<h4>Casos envolvendo policiais militares</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas em confronto com a polícia militar em serviço ">Pessoas feridas em confronto com a polícia militar em serviço </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas por policiais militares de folga ">Pessoas feridas por policiais militares de folga </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas em confronto com a polícia militar em serviço">Pessoas mortas em confronto com a polícia militar em serviço</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas por policiais militares de folga">Pessoas mortas por policiais militares de folga</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais militares feridos em serviço ">Policiais militares feridos em serviço </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais militares mortos em serviço ">Policiais militares mortos em serviço </a></li>
	
	<h4>Casos envolvendo policiais civis</h4>

		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas em confronto com a polícia civil em serviço ">Pessoas feridas em confronto com a polícia civil em serviço </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas por policiais civis de folga ">Pessoas feridas por policiais civis de folga </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas em confronto com a polícia civil em serviço ">Pessoas mortas em confronto com a polícia civil em serviço </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas por policiais civis de folga">Pessoas mortas por policiais civis de folga</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais civis feridos em serviço ">Policiais civis feridos em serviço </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais civis mortos em serviço ">Policiais civis mortos em serviço </a></li>

	<h4>Outros</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Exames Clínicos Laboratoriais Realizados - IML ">Exames Clínicos Laboratoriais Realizados - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Exames Necroscópicos Realizados - IML ">Exames Necroscópicos Realizados - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Exames Periciais Realizados - IC ">Exames Periciais Realizados - IC </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Não Criminais ">Não Criminais </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Nº de pessoas presas por mandado ">Nº de pessoas presas por mandado </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Outros criminais (não inclui contravenções) ">Outros criminais (não inclui contravenções) </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de Crimes Violentos ( Hom.Doloso, Roubo, Latrocínio, Estupro e EMS) ">Total de Crimes Violentos ( Hom.Doloso, Roubo, Latrocínio, Estupro e EMS) </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de delitos ">Total de delitos </a></li>
</ul>';
echo '</div>';
?>