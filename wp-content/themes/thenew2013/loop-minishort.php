<li class="cf minishort-loop">
    <div class="thumb"><?php the_post_thumbnail( 'loop-work' ); ?></div>
    <a href="<?php the_permalink() ?>">
        <h2 class="post-title">
            <?php the_title(); ?>
        </h2>
        <div class="post-metas">
            <?php the_date('Y'); ?>
        </div>
    </a>
</li>