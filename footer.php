<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 */
?>

</div><!-- #main -->
<footer id="colophon" class="site-footer" role="contentinfo">


    <div class="sidebar-container gradient" role="complementary">

        <div class="fb-like-box" data-href="https://www.facebook.com/pages/Mallinckrodt-Academy-PTO/188302781204584" data-width="292" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>

    </div>

    <div class="site-info">

        Mallinckrodt-Academy.org is maintained by the Mallinckrodt Academy PTO.

    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php if (is_post_type_archive('person')) : ?>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>