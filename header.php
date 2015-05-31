<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up until <div id="main">
 *
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <!--[if gte IE 9]>
    <style type="text/css">
        .gradient {
            filter: none;
        }
    </style>
    <![endif]-->
    <?php if (is_post_type_archive('person')) : ?>
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen">
    <?php endif; ?>
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri() ?>/dragon-facebook.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Facebook Like Box -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id="page" class="hfeed site">
    <header id="masthead" class="site-header gradient" role="banner">

        <div id="header-wrapper">
            <div id="header-left">
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'description' ); ?></a></h2>
             </div>

            <div id="header-contact">
                6020 Pernod Ave [<a href="https://www.google.com/maps?q=6020+Pernod+Ave+Saint+Louis,+MO+63139">map</a>]<br>
                Saint Louis, MO 63139<br>
                Phone: 314-352-9212<br>
                Fax: 314-244-1852<br>
                <a href="mailto:mallinckrodtacademypto@gmail.com">mallinckrodtacademypto@gmail.com</a>
            </div>
        </div>

        <div id="navbar" class="navbar">
            <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                <h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
                <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                <?php get_search_form(); ?>
            </nav><!-- #site-navigation -->
        </div><!-- #navbar -->
    </header><!-- #masthead -->

    <div id="main" class="site-main">
