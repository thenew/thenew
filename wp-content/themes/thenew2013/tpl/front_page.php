<?php
// If front page
if(is_front_page()) {
    ?>
    <div class="front-page-block">
        <div class="bg" style="background-image: url(<?php echo $header_img; ?>);"></div>
        <div class="wrapper">
            <?php
            $baseline_page = get_page_by_path('baseline');
            $baseline_args = array(
                'page_id'        => $baseline_page->ID,
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
        </div>
    </div>
<?php } ?>