<?php
$cr = 0;
include ('theme/database.php');
include ('theme/functions.php');
include ('includes/header.inc');
include ('includes/sidebar1.inc'); 

echo '
<div class="wrapper">
	<div id="crimeheader"><h2>Estatísticas da violência no Estado de São Paulo</h2>
		<div id="crimedesc">
		A cada três meses a Secreataria de Segurança Pública de São Paulo divulga os números relativos às ocorrências registradas em São Paulo. Este projeto pretende trabalhar estes números e divulgar de uma forma prática e assessível de forma que todo cidadão possa acompanhar a evolução das estatísticas e os reflexos dos trabalhos sociais em âmbito estadual e municipal.
		</div>
	</div>
	
	<div id="crimeheader">
		<h2>A atuação da polícia no combate ao crime</h2>
		<div id="crimedesc">
		Estão incluídas neste trabalho as atividades das polícias militar e civil no combate ao crime e estatísticas referentes aos crimes cometidos por policiais exercendo sua função e fora dela.
		</div>
	</div>
	
	<div id="crimeheader">
		<h2>A imprensa na divulgação dos dados</h2>
		<div id="crimedesc">
		Foram incluídos links das últimas notícias relacionadas às ocorrências em questão. Desta forma os usuários podem acompanhar como a imprensa divulga os dados e acrescentar qualidade ao material.
		</div>
	</div>
</div>
</div>';
include ('includes/footer.inc');
?>
