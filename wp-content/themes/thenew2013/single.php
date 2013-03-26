<?php
get_header();
?>
<nav id="sidenav" class="sidenav">
    <a class="thenew-logo logo-100" href="<?php site_url('/'); ?>">
        <div class="t demi"></div>
        <div class="n demi"></div>
    </a>
    <ul class="cf menu">
        <li>
            <a href="/blog"><i>Blog</i></a>
            <a href="/blog"><i>Blog</i></a>
        </li>
        <li>
            <a href="/works"><i>Works</i></a>
            <a href="/works"><i>Works</i></a>
        </li>
        <li>
            <a href="/about"><i>Profile</i></a>
            <a href="/about"><i>Profile</i></a>
        </li>
    </ul>
</nav>
<div class="main-col">
    <?php if (have_posts ()) : the_post(); ?>
        <div class="post-loop blabla ">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-content">
            <?php the_content(); ?>
            </div>
        </div>
  <?php endif;
  wp_reset_query();
  ?>
</div>
<?php
get_footer(); ?>