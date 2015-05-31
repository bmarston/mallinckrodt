<?php
/**
 * The template for displaying a single Person (Who We Are directory lightbox)
 *
 */
?>

<!DOCTYPE html>
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
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="person">

    <script type="text/javascript">
        if ( window.self === window.top ) {
            // not in a frame
            document.writeln('<a href="/people/">Mallinckrodt Academy directory</a>');
        }
    </script>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail('thumbnail', array('class' => 'person-photo'));
        }
        ?>


        <h2><?php the_title(); ?></h2>
        <p>
            <?php the_field('title'); ?><br>
            <?php echo get_field('email') ? '<a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a><br>' : ''; ?>
        </p>
        <?php the_field('bio'); ?>


    <?php endwhile; ?>

</div>

</body>
</html>
