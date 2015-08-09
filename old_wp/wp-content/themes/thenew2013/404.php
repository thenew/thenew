<?php
$param_404 = str_replace(array('?', '/', '=', '-'), ' ', strip_tags($_SERVER['REQUEST_URI']));

get_header();
include TEMPLATEPATH .'/nav.php';
?>
<div class="js-ajax-content">
    <div class="main-col-push"></div>
    <div class="main-col">
        <?php if (!empty($param_404)): ?>
            <h2 class="e404-title">404</h2>
            <h2 class="e404-title"><?php echo $param_404; ?> ? </h2>
            <?php
            $args_404 = array(
                'post_type' => array('post', 'work'),
                'posts_per_page' => -1,
                's' => $param_404
            );
            $query_404 = new WP_Query( $args_404 );
            if (have_posts()) : ?>
                    <ul class="cf minishorts-list">
                        <?php while ( $query_404->have_posts() ) : $query_404->the_post(); ?>
                            <li class="item">
                                <?php get_template_part('loop', 'minishort'); ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php
            endif;
            wp_reset_postdata();

        else: ?>
            <h1 class="no-content">Erreur 404 <br />, ce contenu n'existe pas.</h1>
        <?php endif; ?>
    </div>
</div>
<?php
// echo '<script type="text/javascript" src="'.ASSETS_URL.'/js/e404.js"></script>';
get_footer();
