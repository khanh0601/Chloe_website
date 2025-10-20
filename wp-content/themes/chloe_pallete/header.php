<?php

/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title><?php  wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="<?= get_template_directory_uri(); ?>/plugin/font-awesome/css/all.min.css" rel="stylesheet" >
<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/css/style.css?v=<?= SITE_VERSION ?>">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
  $currentLang = get_locale();
  $currentLang= explode("_",$currentLang)[0];
	wp_enqueue_script('jquery', array(), SITE_VERSION, true);
  wp_enqueue_style( 'swiper', get_template_directory_uri() . '/plugin/swiper/swiper-bundle.min.css');
  wp_enqueue_script('swiper', get_template_directory_uri() . '/plugin/swiper/swiper-bundle.min.js',array(),SITE_VERSION,true);
  wp_enqueue_script('gsap', get_template_directory_uri() . '/js/gsap.min.js',array(),SITE_VERSION,true);
  wp_enqueue_script('scrolltrigger', get_template_directory_uri() . '/js/ScrollTrigger.min.js',array(),SITE_VERSION,true);
  wp_enqueue_script('lenis', get_template_directory_uri() . '/js/lenis.min.js',array(),SITE_VERSION,true);
  wp_enqueue_script('animation', get_template_directory_uri() . '/js/animation.js',array(),SITE_VERSION,true);
  wp_enqueue_script('splitType', get_template_directory_uri() . '/js/split-type.js',array(),null,true);
	wp_head();

  $currentLang = get_locale();
  $currentLang= explode("_",$currentLang)[0];
  $homeUrl = home_url();
  $isFrontPage = is_front_page();

  $languages=[
    ["url"=>"#","slug"=>"vi"],
    ["url"=>"#","slug"=>"en"],
  ];
  if(function_exists("pll_the_languages")){
    $languages =   pll_the_languages( array(
           'show_flags' => 0,
           'hide_current'=>0,
           'raw'=>1
      ));  
  }
  
 ?>

<?= tr_options_field('tr_theme_options.script_header');?>


</head>

<?php 
  global $disableFullpage;
  global $pageClass;
?>
<body class="<?= $isFrontPage ?"home-page":"" ?> <?= !empty($disableFullpage)?"disable-fullpage":"" ?> <?= $pageClass ?>">
  <?= tr_options_field('tr_theme_options.script_body');?>

  <!-- Header -->
  <header id="header" class="b-static animated fadeInDownShort delay-250">

  </header>
  <!-- /Header --> 
  <div  class="fp-custom ">