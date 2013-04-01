<?php
get_header();
?>
<nav id="sidenav" class="sidenav">
    <?php include TEMPLATEPATH .'/nav.php'; ?>
</nav>
<?php if (have_posts ()) : the_post();
    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail', false)
    ?>
    <div class="single-thumb">
        <div class="bg parallax" style="background-image:url(<?php echo $thumb[0]; ?>)"></div>
    </div>
    <div class="main-col">
        <div class="post-loop blabla post-single">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="cf post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_query();
get_footer();