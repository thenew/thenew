<?php
/* Template name: Blog */
get_header();
include TEMPLATEPATH .'/nav.php';
?>
<div class="main-col">
    <ul class="posts-list">
        <?php
        $q_args = array(
          'post_type'      => 'post',
          'posts_per_page' => 1,
          'paged'          => $paged
          );
        query_posts($q_args);
        while (have_posts()) : the_post(); ?>
            <li class="cf post-loop blabla">
                <h1 class="post-title">
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h1>
                <?php the_post_thumbnail(); ?>
                <div class="post-content">
                  <?php
                  the_content();
                  ?>
              </div>
          </li>
      <?php endwhile; ?>
    </ul>
    <div class="cf pagination">
        <?php
        posts_nav_link( ' <span class="sep">/</span> ', '<span class="prev">Plus récents</span>', '<span class="next">Plus anciens</span>'  );
        ?>
    </div>
    <?php
    wp_reset_query();
    ?>

</div>
<?php
get_footer();