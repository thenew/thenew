<?php
get_header();
include TEMPLATEPATH .'/nav.php';
?>
<div class="js-ajax-content">
    <?php
    if (have_posts ()) : the_post();
        $thumb_metas = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail', false);
        $thumb = (isset($thumb_metas[0])) ? $thumb_metas[0] : null;
        if($thumb) { ?>
            <div class="single-thumb">
                <div class="bg parallax" style="background-image:url(<?php echo $thumb; ?>)"></div>
            </div>
        <?php } ?>
        <?php if($thumb) echo '<div class="single-content-top"></div>'; ?>
        <div class="main-col <?php if($thumb) echo 'single-content'; ?>">
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
            <h2 class="no-content">Erreur, ce contenu n'existe pas.</h2>
        </div>
    <?php endif; ?>
</div>
<?php
get_footer();