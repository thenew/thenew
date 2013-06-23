<li class="cf post-loop blabla">
    <h2 class="post-title">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h2>
    <div class="thumb"><?php the_post_thumbnail( 'loop-short' ); ?></div>
    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>
</li>