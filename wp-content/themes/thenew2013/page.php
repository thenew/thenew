<?php
get_header();
$thumb = fon_get_thumb_url('post-thumbnail');
?>
<div class="js-ajax-content <?php if($thumb) echo 'single-layout' ?>">
    <div class="main-col-push"></div>
    <?php if (have_posts ()) : the_post(); ?>
        <div class="single-thumb">
            <div class="bg parallax" style="background-image:url(<?php echo $thumb ?>)"></div>
        </div>
        <div class="main-col">
            <div class="main-col-content">
                <div class="post-loop blabla">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                    <div class="cf post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="cf post-metas">
                    <span class="border">/</span>
                    <span class="metas">
                        <?php the_date() ?>
                    </span>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="main-col">
            <h2 class="no-content">Erreur, ce contenu n'existe pas.</h2>
        </div>
    <?php endif; ?>
</div>
<?php
get_footer();