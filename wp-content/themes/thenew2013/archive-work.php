<?php
/* Template name: Works */
get_header();
include TEMPLATEPATH .'/nav.php';
?>
<div class="js-ajax-content">
    <div class="main-col">
        <ul class="cf works-list">
            <?php
            query_posts($query_string . '&posts_per_page=-1');
            while (have_posts()) : the_post();
                get_template_part( 'loop', 'work' );
            endwhile; ?>
        </ul>
        <?php wp_reset_query(); ?>
    </div>
</div>
<?php
get_footer();