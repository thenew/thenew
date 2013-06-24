<li class="cf post-loop blabla">
    <h2 class="post-title">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h2>
    <div class="thumb">
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'loop-short' ); ?></a>
    </div>
    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>
</li>