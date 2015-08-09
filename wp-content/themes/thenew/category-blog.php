<?php get_header(); ?>
<div class="wrapper">
		
	<section>
	
		<?php if (have_posts()) : 
		global $more;    // Declare global $more (before the loop).
	        $j = 16; ?>

		<!-- Begin posts loop -->	
		<?php $loop = new WP_Query( array( 'post_type' => array('post'), 'posts_per_page' => $j ) );
        	while ( $loop->have_posts() ) : $loop->the_post();

    		$more = 0;       // Set (inside the loop) to don't display all content, including text below more.

			if( get_post_type() == 'nutriment' ):
	
				if ( get_the_content()!=null ){
                			require "post-nutriment.php";
				} else {
					$j++;
					//pas de contenu
				}
		
			elseif( get_post_type() == 'post' ):

				require("post.php");

			endif;

	        endwhile;?>
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