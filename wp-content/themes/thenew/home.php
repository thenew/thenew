<?php get_header(); ?>

<!------------ Presentation ---------------------------->
<?php require("presentation.php"); ?>
<div class="wrapper wrapper-index">

	<!------------ The latest Post ---------------------------->
	<?php
		$latest = new WP_query('cat=3,-5,-40&posts_per_page=1');
		if ($latest->have_posts()) : ?>
			<section>
					<!--<h1>Dernier billet</h1>-->
				<?php while ($latest->have_posts()) : $latest->the_post();
						require("post.php");
						endwhile; ?>
				</section>
			<?php endif; ?>

			<!------------ Gallery Portfolio ---------------------------->
	<?php //require("gallery-portfolio.php"); ?>
		<?php	//query_posts('category_name=portfolio');
		//if (have_posts()): ?>
			<!--<section>
				<h1>Portfolio</h1>-->
				<?php //while (have_posts()) : the_post();
					//$images = get_children("post_parent=".get_the_ID()."&post_type=attachment&post_mime_type=image");
						//foreach($images as $image_id=>$c){
								//$visuel = wp_get_attachment_image($image_id);
							//} ?>
						<!--<figure id="post-<?php //the_ID(); ?>" class="post <?php //$class_category; ?>">-->
							<?php //if ($visuel == true) { ?>
									<!--<a href="/portfolio#post-<?php //the_ID(); ?>"><?php //echo $visuel; ?></a>-->
									<?php //} ?>
							<!--</figure>-->
					<?php //endwhile; ?>
				<!--</section>-->
			<?php //endif;
		//wp_reset_query(); ?>

<!------------ Last Posts ---------------------------->
<aside>
		<?php
		//$i = 0;
		$last = new WP_query('category_name=blog&posts_per_page=5');
		if ($last->have_posts()) : ?>
			<h1><a href="/blog" title="billets recents">Billets récents</a></h1>
				<?php while ($last->have_posts()) : $last->the_post();
					//if ($i > 0):
							$titlelength = 24; // the maximum length of the title
								require("minipost.php");
							//else:
							//$i ++;
							//endif;
					endwhile; ?>
			<?php endif; ?>

		<h1>Twitter</h1>
			<ul id="twitter_update_list"></ul>
				<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/twitter_update.js"></script>
				<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/remybarthez.json?callback=twitterCallback2&amp;count=2"></script>
			</aside>

<?php get_footer(); ?>