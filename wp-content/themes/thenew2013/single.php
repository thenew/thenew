<?php get_header(); ?>
<?php include TEMPLATEPATH .'/nav.php'; ?>
<?php if (have_posts ()) : the_post();
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail', false)
    ?>
    <div class="single-thumb">
        <div class="bg parallax" style="background-image:url(<?php echo $thumb[0]; ?>)"></div>
    </div>
    <div class="main-col">
        <div class="post-loop blabla">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="cf post-content">
                <?php the_content(); ?>
            </div>
        </div>
        <div class="cf post-metas">
            <span class="border">/</span>
            <span class="metas">
                <?php the_date() ?>
                &nbsp;/&nbsp;
                <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    $posttags_count = 0;
                    foreach($posttags as $tag) {
                        if($posttags_count > 0) echo ', ';
                        echo '<a href="'.get_tag_link( $tag ).'">'.$tag->name.'</a>';
                        $posttags_count++;
                    }
                }
                ?>
            </span>
        </div>
    </div>
<?php endif;
wp_reset_query();
get_footer();