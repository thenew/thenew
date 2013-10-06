<?php $post_tags = get_the_tags( get_the_ID() ) ?>
<li class="cf work-loop">
    <div class="thumb thumb-work">
        <span class="post-tags">
            <?php
            if($post_tags) {
                foreach ($post_tags as $tag) {
                    echo $tag->name . ' ';
                }
            }
            ?>
        </span>
        <a href="<?php the_permalink() ?>">
        </a>
        <?php the_post_thumbnail( 'loop-work' ); ?>
    </div>
    <div class="">
        <h2 class="work-title">
            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        </h2>
<!--         <div class="work-content">
            <?php the_excerpt(); ?>
        </div> -->
    </div>
</li>