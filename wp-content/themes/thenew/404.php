<?php get_header(); ?>
<div class="wrapper">

	<section>
		<h1>Désolé, cette url est introuvable.</h1>
		<h2>Ce que vous cherchez se trouve peut-être dans les derniers articles publiés : </h2>
	
		<?php
		$last = new WP_query('category_name=blog&posts_per_page=6');
		if ($last->have_posts()) : ?>
			<?php while ($last->have_posts()) : $last->the_post();
				$titlelength = 100; // the maximum length of the title
				require("minipost.php");
			endwhile; ?>
		<?php endif; ?>

		<br />
		<p>Sinon rentrer votre recherche dans le moteur ci-dessous :</p>

			<?php get_search_form(); ?>

	</section>
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>