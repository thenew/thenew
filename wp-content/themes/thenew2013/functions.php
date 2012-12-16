<?php
remove_action('wp_head', 'wlwmanifest_link'); // désactiver la compatibilité avec Windows Live Writer (http://wpchannel.com/desactiver-windows-live-writer-wordpress/)

// activer le support natif des vignettes (http://markjaquith.wordpress.com/2009/12/23/new-in-wordpress-2-9-post-thumbnail-images/)
if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 200, true ); // Normal post thumbnails : (px wide), (px tall), true(hard crop mode)
	add_image_size( 'portfolio-thumbnail', 90, 90 ); // Portfolio thumbnail size
}


if ( function_exists('register_sidebar') ) {
	
	register_sidebar(array(
		'name'=>'Blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name'=>'footer',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

}


/**
 * "Video for Everybody is simply a chunk of HTML code that embeds a video into a website using the HTML5 <video> element,
 * falling back to QuickTime and Flash automatically, without the use of JavaScript or browser-sniffing."
 * 
 * @author Kroc Camen <http://camendesign.com/code/video_for_everybody>
 *
 * @param string $videomp4 video.mp4 path.
 * @param string $videogg video.ogg path.
 * @param string $poster Optional, default is 'wp-content/videos/poster.jpg'.
 * @param string $videotitle Optional, default is 'video'.
 * @param string $height Optional, default is '360'.
 * @param string $height Optional, default is '640'.
 * */
function vfe ($videomp4 = '', $videogg = '', $poster = 'wp-content/videos/poster.jpg', $videotitle ='video' , $height = '360', $width = '640')
{
$swf = 'wp-content/videos/FLVplayer.swf'; $heightflash = $height + 24;
echo'
<!-- "Video For Everybody" v0.4 by Kroc Camen of Camen Design <http://camendesign.com/code/video_for_everybody> -->
<video width="'.$width.'" height="'.$height.'" poster="'.$poster.'" controls>
	<!-- MP4 must be first for iPad! you must use `</source>` to avoid a closure bug in Firefox 3.0 / Camino 2.0! -->
	<source src="'.$videomp4.'" type="video/mp4"><!-- Safari / iPhone video    --></source>
	<source src="'.$videogg.'" type="video/ogg"><!-- Firefox native OGG video --></source>
	<!-- fallback to Flash -->
	<object width="'.$width.'" height="'.$heightflash.'" type="application/x-shockwave-flash"
		data="'.$swf.'?image='.$poster.'&amp;file='.$videomp4.'">
		<!-- Firefox uses the `data` attribute above, IE/Safari uses the param below -->
		<param name="movie" value="'.$swf.'?image='.$poster.'&amp;file='.$videomp4.'" />
		<!-- fallback image. note the title field below, put the title of the video there -->
		<img src="'.$poster.'" width="'.$width.'" height="'.$height.'" alt="'.$videotitle.'"
			title="No video playback capabilities, please download the video below" />
	</object>
</video>
<!-- you *must* offer a download link as they may be able to play the file locally. customise this bit all you want -->
<small><p>T&eacute;l&eacute;charger la video: <a href="'.$videomp4.'">H.264 "MP4"</a> / <a href="'.$videogg.'">Open Format "OGG"</a></p></small>';
}


// ajouter un avatar perso

add_filter( 'avatar_defaults', 'newgravatar' );

function newgravatar ($avatar_defaults) {
 $myavatar = get_bloginfo('template_directory') . '/images/thenewavatar.jpg';
 $avatar_defaults[$myavatar] = "Avatar perso";
 return $avatar_defaults;
}



// ajouter un nouveau type de post perso : nutriments
// http://thinkvitamin.com/dev/create-your-first-wordpress-custom-post-type/
add_action('init', 'nutriment_register');
 
function nutriment_register() {
 
	$labels = array(
		'name' => _x('Nutriments', 'post type general name'),
		'singular_name' => _x('un nutriment', 'post type singular name'),
		'add_new' => _x('Ajouter', 'nutriment item'),
		'add_new_item' => __('Ajouter un nutriment'),
		'edit_item' => __('Modifier un nutriment'),
		'new_item' => __('Nouveau nutriment'),
		'view_item' => __('Afficher un nutriment'),
		'search_items' => __('Chercher un nutriment'),
		'not_found' =>  __('Rien trouvé'),
		'not_found_in_trash' => __('Rien trouvé dans la corbeille'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		//'menu_icon' => get_stylesheet_directory_uri() . '/icon_nutriment.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail','excerpt','comments')
	  ); 
 
	register_post_type( 'nutriment' , $args );
}


// personnaliser les catégories, la taxonomie
register_taxonomy("media", array("nutriment"), array("hierarchical" => true, "label" => "Médias", "singular_label" => "Média", "rewrite" => true));

register_taxonomy("auteur", array("nutriment"), array("label" => "Auteur", "singular_label" => "Auteur", "rewrite" => true));
register_taxonomy("release_date", array("nutriment"), array("label" => "Année", "singular_label" => "Année", "rewrite" => true));
register_taxonomy("moyen", array("nutriment"), array("label" => "Moyens", "singular_label" => "Moyen", "rewrite" => true));
register_taxonomy("tags", array("nutriment"), array("label" => "Tags", "singular_label" => "Tag", "rewrite" => true));


add_action("manage_posts_custom_column",  "nutriment_custom_columns");
add_filter("manage_edit-nutriment_columns", "nutriment_edit_columns");
 
function nutriment_edit_columns($columns){
  $columns = array(
    "cb" => "<input type=\"checkbox\" />",
    "title" => "Titre",
    //"description" => "Description",
    "auteur" => "Auteur",
    "media" => "Médias",
    "moyen" => "Moyens",
    "an" => "Année",
  );
 
  return $columns;
}
function nutriment_custom_columns($column){
  global $post;
 
  switch ($column) {
    //case "description":
      //the_excerpt();
      //break;
    case "auteur":
      echo get_the_term_list($post->ID, 'auteur', '', ', ','');
      break;
    case "media":
      echo get_the_term_list($post->ID, 'media', '', ', ','');
      break;
    case "moyen":
      echo get_the_term_list($post->ID, 'moyen', '', ', ','');
      break;
    case "an":
      echo get_the_term_list($post->ID, 'release_date', '', ', ','');
      break;
  }
}


?>