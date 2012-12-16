<?php get_header(); ?>
<div class="wrapper">
		
	<section>
	
		<?php if (have_posts()) : ?>
	
		<!-- Begin posts loop -->	
			<?php while (have_posts()) : the_post(); 
				require("post.php");
			endwhile; ?>
		<!-- End posts loop -->	
		
			<nav class="navigation">
				<?php if(function_exists('wp_paginate')) {wp_paginate();} ?>
			</nav>
			
		<?php else : ?>
			<h2 class="center">Introuvable</h2>
			<p class="center">Désolé, mais vous cherchez quelque chose qui ne se trouve pas ici.</p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	    
	</section>
		
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>