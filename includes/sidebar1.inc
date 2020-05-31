<?php
// include ('database.php');
echo '<div id="sidebar">
<ul>
	<h4>Crimes</h4>
	
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contra a pessoa ">Contra a pessoa </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contra o patrimonio ">Contra o patrimonio </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contra os costumes ">Contra os costumes </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Contravencionais ">Contravencionais </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Entorpecentes ">Entorpecentes </a></strong></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Estupro ">Estupro </a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Extors�o mediante seq�estro ">Extors�o mediante seq�estro </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Furto - outros ">Furto - outros </a></li></strong>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Furto de ve�culos ">Furto de ve�culos </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Homic�dio Culposo ">Homic�dio Culposo</a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Homic�dio culposo por Acidente de Tr�nsito ">Homic�dio culposo por Acidente de Tr�nsito </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Homic�dio doloso ">Homic�dio Doloso</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=N� de V�timas em Homic�dio Doloso ">V�timas de Homic�dio Doloso</a>)</li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Latroc�nio ">Latroc�nio</a></strong> (<a href="'.$url.'/ocorrencia.php?cr=N� de V�timas de Latroc�nio ">V�timas de Latroc�nio</a>)</li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Les�o corporal culposa outras ">Les�o corporal culposa (outras) </a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Les�o corporal culposa por Acidente de Tr�nsito ">Les�o corporal culposa por Acidente de Tr�nsito </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Les�o corporal dolosa ">Les�o corporal dolosa </a></strong></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo - outros">Roubo - outros</a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo a Banco ">Roubo a Banco </a></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo de Carga ">Roubo de Carga </a></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Roubo de ve�culos ">Roubo de ve�culos </a></strong></li>
       <strong><li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Tentativa de homic�dio ">Tentativa de homic�dio </a></strong></li>
       <li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Tr�fico de entorpecentes ">Tr�fico de entorpecentes </a></li>

	<h4>Atividades de pol�cia judici�ria</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de boletins de ocorr�ncia ">Total de boletins de ocorr�ncia </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de inqu�ritos instaurados ">Total de inqu�ritos instaurados </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de termos circunstanciados lavrados pela Pol�cia Civil">Total de termos circunstanciados lavrados pela Pol�cia Civil</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de termos circunstanciados lavrados pela Pol�cia Militar">Total de termos circunstanciados lavrados pela Pol�cia Militar</a></li>

	<h4>Atividades policiais</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Armas de fogo apreendidas ">Armas de fogo apreendidas </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Laudos Cl�nicos Laboratoriais Expedidos - IML ">Laudos Cl�nicos Laboratoriais Expedidos - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Laudos Necrosc�picos Expedidos - IML ">Laudos Necrosc�picos Expedidos - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Laudos Periciais Expedidos - IC">Laudos Periciais Expedidos - IC</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de autos de apreens�o (art 173 ECA) ">N� de autos de apreens�o (art 173 ECA) </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de infratores apreendidos em flagrante ">N� de infratores apreendidos em flagrante </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de infratores apreendidos por mandado ">N� de infratores apreendidos por mandado </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de pessoas presas em flagrante ">N� de pessoas presas em flagrante </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de revistas pessoais/ identifica��o ">N� de revistas pessoais/ identifica��o </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de Ve�culos Recuperados ">N� de Ve�culos Recuperados </a></li>
		<!--<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pris�es efetuadas (em flagrante+ por mandado) ">Pris�es efetuadas (em flagrante+ por mandado) </a></li>-->
	
	<h4>Casos envolvendo policiais militares</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas em confronto com a pol�cia militar em servi�o ">Pessoas feridas em confronto com a pol�cia militar em servi�o </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas por policiais militares de folga ">Pessoas feridas por policiais militares de folga </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas em confronto com a pol�cia militar em servi�o">Pessoas mortas em confronto com a pol�cia militar em servi�o</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas por policiais militares de folga">Pessoas mortas por policiais militares de folga</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais militares feridos em servi�o ">Policiais militares feridos em servi�o </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais militares mortos em servi�o ">Policiais militares mortos em servi�o </a></li>
	
	<h4>Casos envolvendo policiais civis</h4>

		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas em confronto com a pol�cia civil em servi�o ">Pessoas feridas em confronto com a pol�cia civil em servi�o </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas feridas por policiais civis de folga ">Pessoas feridas por policiais civis de folga </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas em confronto com a pol�cia civil em servi�o ">Pessoas mortas em confronto com a pol�cia civil em servi�o </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Pessoas mortas por policiais civis de folga">Pessoas mortas por policiais civis de folga</a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais civis feridos em servi�o ">Policiais civis feridos em servi�o </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Policiais civis mortos em servi�o ">Policiais civis mortos em servi�o </a></li>

	<h4>Outros</h4>
	
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Exames Cl�nicos Laboratoriais Realizados - IML ">Exames Cl�nicos Laboratoriais Realizados - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Exames Necrosc�picos Realizados - IML ">Exames Necrosc�picos Realizados - IML </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Exames Periciais Realizados - IC ">Exames Periciais Realizados - IC </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N�o Criminais ">N�o Criminais </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=N� de pessoas presas por mandado ">N� de pessoas presas por mandado </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Outros criminais (n�o inclui contraven��es) ">Outros criminais (n�o inclui contraven��es) </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de Crimes Violentos ( Hom.Doloso, Roubo, Latroc�nio, Estupro e EMS) ">Total de Crimes Violentos ( Hom.Doloso, Roubo, Latroc�nio, Estupro e EMS) </a></li>
		<li class="sidebar_item"><a href="'.$url.'/ocorrencia.php?cr=Total de delitos ">Total de delitos </a></li>
</ul>';
echo '</div>';
?>