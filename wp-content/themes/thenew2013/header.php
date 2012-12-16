<!doctype html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="Thenew" content="thenew.fr, le site de Rémy Barthez" />
  <meta name="keywords" content="remy barthez, rémy barthez, rémy, barthez, ry barthez, ry, ry.barthez, remi barthez, rémi barthez, rémi, bartez, barthes, bartes, ry.barthez.free.fr, xenon-360, xenon360, thenew.fr, thenew, the new, twitter.com/rybarthez, remybarthez.fr, remy.barthez.fr, remybarthez.com, developer web, captain ravage, ico, mig" />
  <meta name="author" content="Rémy Barthez" />
  <link href='http://fonts.googleapis.com/css?family=Quicksand:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/z-all.css" type="text/css" media="screen" />
  <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
  <link rel="icon" type="image/png" href="favicon.png" />
  <link rel="apple-touch-icon" href="apple-touch-icon.png" />
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/mootools-yui-compressed.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/events.js"></script>
  <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/html5.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/selectivizr-min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>
<!--[if lt IE 7 ]><body <?php body_class('is_ie6 lt_ie7 lt_ie8 lt_ie9 lt_ie10'); ?>><![endif]-->
<!--[if IE 7 ]><body <?php body_class('is_ie7 lt_ie8 lt_ie9 lt_ie10'); ?>><![endif]-->
<!--[if IE 8 ]><body <?php body_class('is_ie8 lt_ie9 lt_ie10'); ?>><![endif]-->
<!--[if IE 9 ]><body <?php body_class('is_ie9 lt_ie10'); ?>><![endif]-->
<!--[if gt IE 9 ]><body <?php body_class('is_ie10 gt_ie9'); ?>><![endif]-->
<!--[if !IE]><!--><body <?php body_class(); ?> ><!--<![endif]-->
  <header class="header v-wrapper">
    <a class="thenew-logo" href="<?php site_url('/'); ?>">
      <div class="t demi"></div>
      <div class="n demi"></div>
    </a>
  </header>
  <div class="wrapper">