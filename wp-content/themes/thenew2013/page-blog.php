<?php
/* Template name: Blog */
get_header();
?>
<nav id="sidenav" class="sidenav">
    <?php include TEMPLATEPATH .'/nav.php'; ?>
</nav>
<div id="main-col" class="main-col">
    <ul class="posts-list">
        <?php
        $q_args = array(
          'post_type'      => 'post',
          'posts_per_page' => 8,
          'paged'          => $paged
          );
        query_posts($q_args);
        while (have_posts()) : the_post(); ?>
            <li class="post-loop blabla">
                <h1 class="post-title">
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                    <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h1>
                <?php the_post_thumbnail(); ?>
                <div class="post-content">
                  <?php
                  the_content();
                  ?>
              </div>
          </li>
      <?php endwhile;
      wp_reset_query();
      ?>
    </ul>
    <div id="overview" class="overview"></div>
</div>
<?php
get_footer(); ?>