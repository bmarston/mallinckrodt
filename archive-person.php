<?php
/**
 * The template for displaying the Person archive (Who We Are directory)
 *
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php if ( have_posts() ) : ?>
                <header class="archive-header">
                    <h1 class="archive-title">Who We Are</h1>
                </header><!-- .archive-header -->

                <div id="who-we-are" class="entry-content">

                    <section>
                        <h2>School</h2>
                        <p>
                            Mallinckrodt Academy<br>
                            6020 Pernod Ave<br>
                            Saint Louis, MO 63139<br>
                            Phone: 314-352-9212<br>
                            Fax: 314-244-1852
                         </p> 

                         <p>
                            Mallinckrodt Academy conducts tours every Wednesday at 9:30 am.  Please call Ms. Jackson, our school secretary, to schedule your tour today.
                         </p>

                        <p>
                            <a href="http://www.slps.org/contact" target="_blank">District contact information</a>
                        </p>
                    </section>

                    <?php
                    // ----------- STAFF -----------
                    $args = array(
                        'post_type'     => 'person',
                        'category_name' => 'staff',
                        'orderby'       => 'menu_order',
                        'order'         => 'ASC'
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts()) : ?>
                        <section>
                            <h2>Staff</h2>
                            <p>
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <a class="fancybox" data-fancybox-type="iframe" href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php the_field('title') ?></a><br>
                            <?php endwhile; ?>
                            </p>
                        </section>
                    <?php endif; ?>


                    <?php
                    // ----------- TEACHERS -----------
                    $args = array(
                        'post_type'      => 'person',
                        'category_name'  => 'teacher',
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                        'posts_per_page' => -1
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts()) : ?>
                        <section>
                            <h2>Teachers</h2>
                            <p>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <a class="fancybox" data-fancybox-type="iframe" href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php the_field('title') ?></a><br>
                                <?php endwhile; ?>
                            </p>
                        </section>
                    <?php endif; ?>


                    <?php
                    // ----------- BOARD MEMBERS -----------
                    $args = array(
                        'post_type'     => 'person',
                        'category_name' => 'board-member',
                        'orderby'       => 'menu_order',
                        'order'         => 'ASC'
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts()) : ?>
                        <section>
                            <h2>PTO Board Members</h2>
                            <p>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <a class="fancybox" data-fancybox-type="iframe" href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php the_field('title') ?></a><br>
                                <?php endwhile; ?>
                            </p>
                        </section>
                    <?php endif; ?>


                    <?php
                    // ----------- VOLUNTEERS -----------
                    $args = array(
                        'post_type'     => 'person',
                        'category_name' => 'volunteer',
                        'orderby'       => 'menu_order',
                        'order'         => 'ASC'
                    );
                    $query = new WP_Query( $args );

                    if ( $query->have_posts()) : ?>
                        <section>
                            <h2>Volunteers</h2>
                            <p>
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <a class="fancybox" data-fancybox-type="iframe" href="<?php the_permalink(); ?>"><?php the_title(); ?>, <?php the_field('title') ?></a><br>
                                <?php endwhile; ?>
                            </p>
                        </section>
                    <?php endif; ?>


                </div>

                <script type="text/javascript">
                    jQuery(document).ready(function (){
                        jQuery(".fancybox").fancybox({
                            width: 604,
                            minHeight: 200
                        });
                    });
                </script>

            <?php else : ?>
                <?php get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>

        </div><!-- #content -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>