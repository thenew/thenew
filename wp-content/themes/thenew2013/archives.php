<?php get_header(); ?>
<div class="wrapper">

<section>
	<?php get_search_form(); ?>
	
	<h2>Archives par mois&nbsp;:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
	
	<h2>Archives par catégorie&nbsp;:</h2>
	<ul>
		<?php wp_list_categories(); ?>
	</ul>
</section>

<?php get_footer(); ?>