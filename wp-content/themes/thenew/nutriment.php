<?php

/*

Template Name: Nutriments

*/

?>

<?php get_header(); ?>

<div class="wrapper">



<section>



<h1>Nutriments</h1>

<p>Mon alimentation artistique au jour le jour, sous certaines contraintes et sans la musique, plus proche de l'atmosphère que de l'aliment.</p>



    <?php

    global $more;



	$type = 'nutriment';

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args=array(

    		'post_type' => $type,

    		'post_status' => 'publish',

    		'paged' => $paged,

		'posts_per_page' => -1,

    		'caller_get_posts'=> 1

  	);

	$temp = $wp_query;  // assign original query to temp variable for later use

	$wp_query = null;

	$wp_query = new WP_Query();

	$wp_query->query($args);



	if($wp_query->have_posts()) : 

		while($wp_query->have_posts()) : $wp_query->the_post();

			require "post-nutriment.php";

		endwhile;

	endif; ?>



	<nav class="navigation">

		<?php if(function_exists('wp_paginate')) {wp_paginate();} ?>

	</nav>

    

	<?php $wp_query = null; $wp_query = $temp; ?>

	

	

</section>



<?php get_sidebar(); ?>

<?php get_footer(); ?>