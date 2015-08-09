<!-- pour récupérer l'image visuel -->
<?php
	$visuel = false;
	$images = get_children("post_parent=".get_the_ID()."&post_type=attachment&post_mime_type=image");
	foreach($images as $image_id=>$last){
		$visuel = wp_get_attachment_image($image_id, "medium"); /*($image_id,"medium") or ($image_id,"full")*/
		$visuelFullSrc = wp_get_attachment_url($image_id);
	}
	//if ($visuel == true) { 
	//<a href="echo $visuelFullSrc;" >echo $visuel;</a>}

	$vimeo = get_post_custom_values("vimeo");
	$videohtml = get_post_custom_values("videohtml");
	$thetitle = get_the_title();
?>

<article id="post-<?php the_ID(); ?>" class="col2">
	
	<header>
		<h3><a href="#post-<?php the_ID(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	</header>
	
	<!--video-->
	<?php if(count($vimeo)>0){ $vimeo = $vimeo[0]; ?>
		<object width="640" height="360"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" />
			<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo  $vimeo; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=7053c9&amp;fullscreen=1" />
			<embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo  $vimeo; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=7053c9&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="640" height="360"></embed>
		</object>
	<?php }elseif(count($videohtml)>0){ $videohtml = $videohtml[0];
		vfe("$videohtml.mp4", "$videohtml.ogg", "$visuelFullSrc", "$thetitle");
	}?>
		
		<?php the_content(''); ?>
	

</article>