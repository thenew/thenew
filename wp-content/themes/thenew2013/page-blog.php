<?php
/* Template name: Blog */
get_header();
?>
<nav id="sidenav" class="sidenav">
  <a class="thenew-logo logo-100" href="<?php site_url('/'); ?>">
    <div class="t demi"></div>
    <div class="n demi"></div>
</a>
<ul class="cf menu">
    <li><a href="/blog">Blog</a></li>
    <li><a href="/works">Works</a></li>
    <li><a href="/about">Profile</a></li>
</ul>
</nav>
<div class="main-col">
    <ul class="posts-list">
        <?php
        $q_args = array(
          'post_type'      => 'post',
          'posts_per_page' => 2,
          'paged'          => $paged
          );
        query_posts($q_args);
        while (have_posts()) : the_post(); ?>
            <li class="post-loop">
                <?php
                the_title();
                ?>
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
</div>
<?php
get_footer(); ?>