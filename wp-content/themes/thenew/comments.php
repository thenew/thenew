<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Merci de ne pas lancer cette page directement');
	if ( post_password_required() ) { ?>
		<p class="nocomments">Cet article est protégé par un mot de passe. Entrez ce mot de passe pour lire les commentaires.</p>
	<?php
		return;
	}
?>

<h3 id="comments"><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments')); ?>
<?php if ( comments_open() ) : ?>
	<a href="#respond" title="<?php _e("Leave a comment"); ?>">&raquo;</a>
<?php endif; ?>
</h3>

<?php if ( have_comments() ) :
$i = 0 ; ?>
	<ol class="commentlist">
		<?php foreach ($comments as $comment) :
		$i++; ?>
			<li class="comment <?php if($i%2==0){ echo'pair'; } ?>" id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment, 48 ); ?>
				<div class="meta">
					<h3><?php comment_author_link() ?></h3><br />
					<p><small><?php comment_date() ?> à <?php comment_time() ?><?php edit_comment_link(__("Edit This"), ' | '); ?></small></p>
				</div>
				<div class="clear"></div>
				<?php comment_text() ?>
			</li>		
		<?php endforeach; ?>
	</ol>

	<nav class="navigation">
		<?php if(function_exists('wp_paginate_comments')) {wp_paginate_comments();} ?>
	</nav>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Les commentaires sont fermés.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<div class="cancel-comment-reply"><small><?php cancel_comment_reply_link(); ?></small></div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>Vous devez être  <a href="<?php echo wp_login_url( get_permalink() ); ?>">connecté</a> pour publier un commentaire.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<h3><?php comment_form_title( 'Laisser un commentaire', 'Laisser une réponse à %s' ); ?></h3>

<?php if ( is_user_logged_in() ) : ?>
<p>Connecté en tant que <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Se déconnecter du site.">Se déconnecter &raquo;</a></p>
<?php else : ?>

<p class="author">
	<label for="author">Nom <?php if ($req) echo "(obligatoire)"; ?></label>
	<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
</p>
<p class="email">
	<label for="email">Mél. (ne sera pas publiée) <?php if ($req) echo "(obligatoire)"; ?></label>
	<input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
</p>
<div class="clear"></div>
<p>
	<label for="url">Site Web</label>
	<input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
</p>
<?php endif; ?>
<p>
	<label for="comment">Commentaire</label>
	<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
</p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Valider le commentaire" /><?php comment_id_fields(); ?></p>
<?php do_action('comment_form', $post->ID); ?>
<div class="clear"></div>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>
