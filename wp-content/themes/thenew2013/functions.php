<?php

remove_action('wp_head', 'wlwmanifest_link'); // désactiver la compatibilité avec Windows Live Writer (http://wpchannel.com/desactiver-windows-live-writer-wordpress/)

add_theme_support( 'post-thumbnails' );

// Normal post thumbnails : (px wide), (px tall), true(hard crop mode)
set_post_thumbnail_size( 1040, 600, true );

// Portfolio thumbnail size
add_image_size( 'portfolio-thumbnail', 90, 90 );

// ajouter un avatar perso

function newgravatar ($avatar_defaults) {
 $myavatar = get_bloginfo('template_directory') . '/images/thenewavatar.jpg';
 $avatar_defaults[$myavatar] = "Avatar perso";
 return $avatar_defaults;
}

add_filter( 'avatar_defaults', 'newgravatar' );

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
