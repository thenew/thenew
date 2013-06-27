<?php
get_header();
include TEMPLATEPATH .'/nav.php';
?>
<div class="js-ajax-content">
    <div class="main-col">
        <h2 class="e404-title"><?php echo get_search_query(); ?> ? </h2>
        <?php
        $args_search = array(
            'posts_per_page' => -1,
            's' => get_search_query()
        );
        $search_query = new WP_Query( $args_search );
        if (have_posts()) : ?>
                <ul class="cf minishorts-list">
                    <?php while ( $search_query->have_posts() ) : $search_query->the_post();
                        get_template_part('loop', 'minishort');
                    endwhile; ?>
                </ul>
            </div>
        <?php else: ?>
            <h1 class="no-content">Aucun contenu correspond à “<?php echo get_search_query(); ?>”.</h1>
        <?php
        endif;
        wp_reset_postdata();
        ?>
    </div>
</div>
<?php
// echo '<script type="text/javascript" src="'.ASSETS_URL.'/js/e404.js"></script>';
get_footer();
