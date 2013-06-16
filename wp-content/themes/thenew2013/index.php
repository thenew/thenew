<?php get_header(); ?>

<header class="header v-wrapper">
    <a class="thenew-logo" href="<?php site_url('/'); ?>">
        <div class="t demi"></div><div class="n demi"></div>
    </a>
</header>

<?php
$baseline_page = get_page_by_path('baseline');
$baseline_args = array(
  'page_id'      => $baseline_page->ID,
  'posts_per_page' => 1
);
$baseline_query = new WP_Query($baseline_args);
if($baseline_query->have_posts()): ?>
  <div class="baseline">
    <?php while($baseline_query->have_posts()):$baseline_query->the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  </div>
<?php endif;
wp_reset_postdata();
?>

<div class="home-footer"><?php echo fon_to_roman(get_the_date('Y')); ?></div>
<?php
get_footer();