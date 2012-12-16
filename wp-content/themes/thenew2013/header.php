<!doctype html>
<html lang="fr-FR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="Thenew" content="thenew.fr, le site de Rémy Barthez" />
  <meta name="keywords" content="remy barthez, rémy barthez, rémy, barthez, ry barthez, ry, ry.barthez, remi barthez, rémi barthez, rémi, bartez, barthes, bartes, ry.barthez.free.fr, xenon-360, xenon360, thenew.fr, thenew, the new, twitter.com/rybarthez, remybarthez.fr, remy.barthez.fr, remybarthez.com, graphiste, webdesign, web design, flash, web designer, webdesigner, infographiste, aries, aries 3d, toulouse, captain ravage, ico, mig " />
  <meta name="author" content="Rémy Barthez" />
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/base.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <!--[if IE]><link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style-ie.css" type="text/css" media="screen" /><![endif]-->
  <link rel="stylesheet" href="/zoombox/zoombox.css" type="text/css" media="screen" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico" />
  <link rel="icon" type="image/png" href="favicon.png" />
  <link rel="apple-touch-icon" href="apple-touch-icon.png" />
  <script src="http://code.jquery.com/jquery-1.4.2.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/base.js" type="text/javascript"></script>
  <link href="https://plus.google.com/107439419264163972958" rel="publisher" />
  <script type="text/javascript">
  window.___gcfg = {lang: 'fr'};
  (function()
    {var po = document.createElement("script");
    po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(po, s);
  })();
  </script>
  <?php wp_head(); ?>
</head>
<!--[if lt IE 7 ]><body <?php body_class('is_ie6 lt_ie7 lt_ie8 lt_ie9 lt_ie10'); ?>><![endif]-->
<!--[if IE 7 ]><body <?php body_class('is_ie7 lt_ie8 lt_ie9 lt_ie10'); ?>><![endif]-->
<!--[if IE 8 ]><body <?php body_class('is_ie8 lt_ie9 lt_ie10'); ?>><![endif]-->
<!--[if IE 9 ]><body <?php body_class('is_ie9 lt_ie10'); ?>><![endif]-->
<!--[if gt IE 9 ]><body <?php body_class('is_ie10 gt_ie9'); ?>><![endif]-->
<!--[if !IE]><!--><body <?php body_class(); ?> ><!--<![endif]-->
<header>
  <a href="<?php bloginfo('home'); ?>"><p></p></a>
  <nav>
    <h1>
      <?php wp_list_categories("depth=1&title_li="); ?>
      <li><a href="http://cargocollective.com/thenewfr">Portfolio</a></li>
      <?php wp_list_pages("depth=1&title_li="); ?>
    </h1>
  </nav>
</header>