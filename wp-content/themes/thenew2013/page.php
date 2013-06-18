<?php
get_header();
include TEMPLATEPATH .'/nav.php';

if (have_posts ()) : the_post();
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail', false);
    if(isset($thumb[0])) { ?>
        <div class="single-thumb">
            <div class="bg parallax" style="background-image:url(<?php echo $thumb[0]; ?>)"></div>
        </div>
    <?php } ?>
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
            </span>
        </div>
    </div>
<?php else: ?>
    <div class="main-col">

    </div>
<?php
endif;

get_footer();