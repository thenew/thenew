<?php
get_header();
include TEMPLATEPATH .'/nav.php';
?>
<header class="header v-wrapper">
    <a class="thenew-logo" href="<?php site_url('/'); ?>">
        <div class="t demi"></div><div class="n demi"></div>
    </a>
</header>
<?php
$baseline_page = get_page_by_path('baseline');
if($baseline_page) {
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
}
?>

<div class="home-footer">
    <span class="date"><?php echo fon_to_roman(get_the_date('Y')); ?></span>
    <?php
    $credits_page = get_page_by_path('credits');
    if($credits_page) {
        ?>
        / <a href="<?php echo get_page_link( $credits_page->ID ) ?>" class="credits"><?php echo get_the_title( $credits_page->ID ) ?></a>
        <?php
    }
    ?>
</div>
<?php
get_footer();