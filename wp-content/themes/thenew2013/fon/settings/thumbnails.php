<?php
global $fon_thumbnail_sizes;

// Thumbnails sizes

$fon_thumbnail_sizes = array(
    array( 'loop-short', 800, 225, true ),
    array( 'loop-work', 200, 200, true, array('work') )
);







// Functions

function fon_thumbnail_sizes() {
    global $fon_thumbnail_sizes;
    foreach ($fon_thumbnail_sizes as $thumb) {
        // if post type
        if(!isset($thumb[4])) {
            add_image_size( $thumb[0], $thumb[1], $thumb[2], $thumb[3] );
        }
    }
}
fon_thumbnail_sizes();

function fon_gallery_upload($metadata, $attachment_id) {
    $post_id = $_POST['post_id'];
    $upload_dir = wp_upload_dir();

    global $fon_thumbnail_sizes;
    foreach ($fon_thumbnail_sizes as $thumb) {
        if( isset($thumb[4]) && is_array($thumb[4]) ) {
            if(!in_array(get_post_type($post_id), $thumb[4]))
                return $metadata;

            $file = image_resize($upload_dir['basedir'] . '/' . $metadata['file'], $thumb[1], $thumb[2], $thumb[3]);
            $metadata['sizes'][$thumb[0]] = array('file' =>  basename($file), 'width' =>  $thumb[1], 'height' =>  $thumb[2]);
        }
    }

    return $metadata;
}
add_filter('wp_generate_attachment_metadata', 'fon_gallery_upload', 10, 2);