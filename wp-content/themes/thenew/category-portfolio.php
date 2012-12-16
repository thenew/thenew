<?php get_header(); ?>
<section>

	<?php if (have_posts()) : ?>
	
	<div id="home"></div>
	<nav>
			<?php while (have_posts()) : the_post(); ?>
				<h3><a href="#post-<?php the_ID(); ?>"><?php the_title(); ?></a></h3>
			<?php endwhile; ?>
	</nav>
			
	<!-- Begin posts loop -->	
			<?php while (have_posts()) : the_post(); 
				require("post-portfolio.php");
			endwhile; ?>
	<!-- End posts loop -->	
	<?php else : ?>
			<h2 class="center">Introuvable</h2>
			<p class="center">Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici.</p>
			<?php get_search_form(); ?>
	<?php endif; ?>
    
</section>

	<script type="text/javascript">
	    $(document).ready(function () {
		    $.localScroll.defaults.axis = 'x';
		    $.localScroll();
	    });
	</script>
	<!--<script type="text/javascript" src="/zoombox/jquery.js"></script>-->
	<script type="text/javascript" src="/zoombox/zoombox.js"></script>
	<!-- Woopra Code Start -->
		<script type="text/javascript" src="//static.woopra.com/js/woopra.v2.js"></script>
		<script type="text/javascript">
		woopraTracker.track();
		</script>
	<!-- Woopra Code End -->
</body>
</html>