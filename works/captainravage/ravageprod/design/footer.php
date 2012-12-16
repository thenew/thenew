<?php

function foot()
{
echo'
	<div id="footer">
				<p>&copy;2009 Ravage Prod  -  <a href="../about/index.html" title="about">About</a> - <a href="../contact/index.html" title="contact">Contact</a> - <a href="../download/index.html" title="Download">Download</a> - <a href="#" title="home">Home</a></p>
		</div>    
	
	
		<!-- Script Google Analytics -->
		
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-164644-8");
	pageTracker._trackPageview();
	} catch(err) {}</script> ';
}

?>