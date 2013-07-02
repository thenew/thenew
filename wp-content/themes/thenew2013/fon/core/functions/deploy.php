<?php

add_action( 'init', 'fon_deploy_actions' );

function fon_deploy_actions(){
    if( !isset($_GET['fon']) ||  $_GET['fon'] != 'deploy' ) return;
    $css_version = fon_update_css();
}
