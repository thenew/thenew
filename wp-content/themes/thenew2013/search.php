<?php get_header(); ?>
<div class="wrapper">

<section>
	<?php if (have_posts()) : ?>
	
		<h1>Résultats de recherche</h1>
		
		<nav class="navigation">
			<?php if(function_exists('wp_paginate')) {wp_paginate();} ?>
		</nav>
		
		<?php while (have_posts()) : the_post();
			$titlelength = 100; // the maximum length of the title
			require("minipost.php");
		endwhile; ?>
		
		<nav class="navigation">
			<?php if(function_exists('wp_paginate')) {wp_paginate();} ?>
		</nav>
		
	<?php else : ?>
	
		<h2 class="center">Aucun article trouvé. Essayer une autre recherche ?</h2>
		<?php get_search_form(); ?>
		
	<?php endif; ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>