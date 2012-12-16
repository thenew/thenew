<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="fadeout"></div>
	<header>
		<h4><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
		<?php //if the title's length exceeds $titlelength, it's cuted and followed by '...'
		if(strlen(get_the_title()) > $titlelength): echo substr(get_the_title(),0,$titlelength); ?> ...<?php else: the_title(); endif; ?></a></h4>
		<time datetime="<?php the_time('y');?>-<?php the_time('m');?>-<?php the_time('j'); ?>" pubdate><?php the_time('j'); ?><abbr title="<?php the_time('F'); ?>"><?php the_time('M'); ?></abbr><?php the_time('Y'); ?></time> <?php the_category(' ') ?><?php the_tags(' | <small>',', ','</small>'); ?>
	</header>
</article>