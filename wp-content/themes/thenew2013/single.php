<?php
get_header();

/* Custom styles */

$custom_color = get_post_meta( get_the_ID(), 'fon_custom_color', 1 );
$custom_font = get_post_meta( get_the_ID(), 'fon_custom_font_name', 1 );
if(!empty($custom_font))
    echo "\n".'<link href="http://fonts.googleapis.com/css?family='.$custom_font.'" rel="stylesheet" type="text/css">'."\n";

if(!empty($custom_font) || !empty($custom_color)):
    echo '<style>.blabla .post-title, .blabla h1, .blabla h2 {';
    if(!empty($custom_font)) echo 'font-family: "'.$custom_font.'";';
    if(!empty($custom_color)) echo 'color: '.$custom_color.';';
    echo '}';
    if(!empty($custom_color))
        echo '.blabla a, .single-post .post-metas .border { color: '.$custom_color.';}';
    echo '</style>'."\n";
endif;

/* End Custom styles */

?>
<div class="js-ajax-content single-layout">
    <div class="main-col-push"></div>
    <?php if (have_posts ()) : the_post(); ?>
        <div class="single-thumb">
            <div class="bg parallax" style="background-image:url(<?php echo fon_get_thumb_url('post-thumbnail'); ?>)"></div>
        </div>
        <div class="main-col">
            <div class="main-col-content">
                <div class="post-loop blabla">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="cf post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
                $work_url = get_post_meta( get_the_ID(), 'fon_url', 1 );
                $work_github_url = get_post_meta( get_the_ID(), 'fon_github_url', 1 );
                if(!empty($work_url)):
                    ?>
                    <div class="cf post-metas">
                        <span class="border">/</span>
                        <span class="metas"><a target="_blank" href="<?php echo $work_url; ?>"><?php echo untrailingslashit(preg_replace('#^https?://#', '', $work_url)); ?></a></span>
                    </div>
                    <?php
                endif;
                if(!empty($work_github_url)):
                    ?>
                    <div class="cf post-metas">
                        <span class="border">/</span>
                        <span class="metas"><a target="_blank" href="<?php echo $work_github_url; ?>"><?php echo untrailingslashit(preg_replace('#^https?://#', '', $work_github_url)); ?></a></span>
                    </div>
                <?php endif; ?>
                <div class="cf post-metas">
                    <span class="border">/</span>
                    <span class="metas">
                        <?php the_date();
                        $posttags = get_the_tags();
                        if ($posttags) {
                            echo '&nbsp;/&nbsp;';
                            $posttags_count = 0;
                            foreach($posttags as $tag) {
                                if($posttags_count > 0) echo ', ';
                                echo '<a href="'.get_tag_link( $tag ).'">'.$tag->name.'</a>';
                                $posttags_count++;
                            }
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
    <?php endif;
    wp_reset_query(); ?>
</div>
<?php
get_footer();
