<?php get_header(); ?>
<div class="wrapper">

	<section>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content('Lire la suite'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		<?php endwhile; endif; ?>
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); 
		//comments_template(); ?>
	</section>

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
