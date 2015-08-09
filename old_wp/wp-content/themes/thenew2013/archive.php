<?php
/* Template name: Blog */
get_header();
?>
<div class="js-ajax-content">
    <?php
    $queried_obj = get_queried_object();

    // If archives
    if(isset($queried_obj->name)) {
        $archives_title = 'Archives';
        $archives_title .= ' <span class="sep">/</span> ' . $queried_obj->name;
        ?>
        <div class="archives-title"><h1><?php echo $archives_title; ?></h1></div>
    <?php } ?>

    <div class="main-col-push"></div>
    <div class="main-col">
        <div class="main-col-content">
            <?php
            if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
            elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
            else { $paged = 1; }

            // If page blog
            if( is_front_page() ||  isset($queried_obj) && isset($queried_obj->post_name) && $queried_obj->post_name == "blog" ) {
                $q_args = array(
                    'post_type'      => 'post',
                    'paged'          => $paged
                );
                query_posts($q_args);
                echo '<ul class="posts-list">';
                    while (have_posts()) : the_post();
                        get_template_part( 'loop', 'short' );
                    endwhile;
            } else {
                echo '<ul class="minishorts-list">';
                    while (have_posts()) : the_post();
                        get_template_part( 'loop', 'minishort' );
                    endwhile;
            }
            ?>
            </ul>
            <div class="cf pagination">
                <?php
                posts_nav_link( ' <span class="sep">/</span> ', '<span class="prev">Plus récents</span>', '<span class="next">Plus anciens</span>'  );
                ?>
            </div>
            <?php wp_reset_query(); ?>

        </div>
    </div>
</div>
<?php
get_footer();