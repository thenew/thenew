<?php
/* Template name: CV */
get_header(); the_post();
?>
<nav id="sidenav" class="sidenav">
    <?php include TEMPLATEPATH .'/nav.php'; ?>
</nav>
<div id="main-col" class="main-col template-cv">
    <h1 class="post-title"><?php the_title(); ?></h1>
    <div class="blabla post-content">
        <?php the_content(); ?>
    </div>
</div>
<?php
get_footer();