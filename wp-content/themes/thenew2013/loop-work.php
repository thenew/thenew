<li class="cf work-loop">
    <div class="thumb thumb-work">
        <a href="<?php the_permalink() ?>"></a>
        <?php the_post_thumbnail( 'loop-work' ); ?>
    </div>
    <div class="">
        <h2 class="work-title">
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h2>
        <div class="work-content">
            <?php the_excerpt(); ?>
        </div>
    </div>
</li>