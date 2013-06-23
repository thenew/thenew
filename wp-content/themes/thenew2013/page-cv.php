<?php
/* Template name: CV */
get_header();
include TEMPLATEPATH .'/nav.php';
?>
<div class="js-ajax-content">
    <?php if (have_posts ()) : the_post(); ?>
        <div class="main-col single-content">
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
            <h2 class="no-content">Aucun article.</h2>
        </div>
    <?php endif; ?>
</div>
<?php
get_footer();