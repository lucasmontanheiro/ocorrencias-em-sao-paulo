<?php 
$crime_code = $_GET['cr'];
$crime_region = $_GET['region'];
include ('theme/database.php');
include ('theme/functions.php');
include ('theme/header.php');
include ('theme/sidebar1.php'); 


echo '
<div class="wrapper col-lg-9">';
echo '	
			<h2>'.crime('name', $crime_code).'</h2>
			<div class="col-lg-12">
			<p>'.crime('definition', $crime_code).'</p>

			<!-- main graph -->			
			';
				column_graph("Capital", $chart_title, $crime_code, $crime_region);
echo '
			</div>
			
 			<div id="table_div1"></div>

			<div class="col-lg-12">	

				<!-- blocks -->

				<div class="row">
				  <div class="col-lg-4">
				      <div class="caption">
				        <h3>2005</h3>
				        <p>'; echo listLinks('2005', $crime_code); echo '</p>
				      </div>
				  </div>
				<div class="col-lg-4">
				      <div class="caption">
				        <h3>2006</h3>
				        <p>'; echo listLinks('2006', $crime_code); echo '</p>
				      </div>
				  </div>
				  <div class="col-lg-4">
				      <div class="caption">
				        <h3>2007</h3>
				        <p>'; echo listLinks('2007', $crime_code); echo '</p>
				      </div>
				  </div>
				</div>


				<div class="row">
				  <div class="col-lg-4">
				      <div class="caption">
				        <h3>2008</h3>
				        <p>'; echo listLinks('2008', $crime_code); echo '</p>
				      </div>
				  </div>
				<div class="col-lg-4">
				      <div class="caption">
				        <h3>2009</h3>
				        <p>'; echo listLinks('2009', $crime_code); echo '</p>
				      </div>
				  </div>
				  <div class="col-lg-4">
				      <div class="caption">
				        <h3>2010</h3>
				        <p>'; echo listLinks('2010', $crime_code); echo '</p>
				      </div>
				  </div>
				</div>

				<div class="row">
				  <div class="col-lg-4">
				      <div class="caption">
				        <h3>2011</h3>
				        <p>'; echo listLinks('2011', $crime_code); echo '</p>
				      </div>
				  </div>
				<div class="col-lg-4">
				      <div class="caption">
				        <h3>2012</h3>
				        <p>'; echo listLinks('2012', $crime_code); echo '</p>
				      </div>
				  </div>
				  <div class="col-lg-4">
				      <div class="caption">
				        <h3>2013</h3>
				        <p>'; echo listLinks('2013', $crime_code); echo '</p>
				      </div>
				  </div>
				</div>


			</div>

<div class="col-lg-12">	
	<h3>Comentários</h3>
	<div id="disqus_thread"></div>
</div>';

echo "
<script>
/**
* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');

s.src = '//ocorrenciasemsp.disqus.com/embed.js';

s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>";

echo '
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>




		</div>
	</div>
</div>
</div>
</div>';

include ('theme/footer.php');
?>
