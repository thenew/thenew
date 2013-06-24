<?php
global $fon_meta_boxes;
$fon_meta_boxes = array();

/*
    Install and activate meta-box plugin ( http://wordpress.org/plugins/meta-box/ )
    Supported fields :
        button, checkbox_list, checkbox, color, date, datetime, divider, email, file, file_advanced, heading, hidden, image, image_advanced, map, number, oembed, password, plupload_image, post, radio, range, select, select_advanced (uses select2), slider, taxonomy, text, textarea, thickbox_image, time, url, wysiwyg
*/

/* Meta box declarations
   ----------------------------- */

$prefix = 'fon_';

$fon_meta_boxes[] = array(
    'title' => 'Personnalisation',
    'pages' => array( 'post' ),
    'fields' => array(
        array(
            'name'  => 'Couleur',
            'id'    => "{$prefix}custom_color",
            'type'  => 'color',
        ),
        array(
            'name' => 'Google Font Name',
            'id'   => "{$prefix}custom_font_name",
            'type' => 'text'
        )
    )
);



