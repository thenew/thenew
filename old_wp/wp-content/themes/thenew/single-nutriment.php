<?php get_header(); ?>
<div class="wrapper">

<section>

	<?php if (have_posts()) :
		while (have_posts()) : the_post();
			require "post-nutriment.php";
			comments_template();
		endwhile;
	else: ?>

		<p>Désolé, aucun article ne correspond à vos critères.</p>

	<?php endif; ?>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>