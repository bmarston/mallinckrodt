<?php

// Use the after_setup_theme hook with a priority of 11 to load after the
// parent theme, which will fire on the default priority of 10
add_action( 'after_setup_theme', 'remove_support_from_child_theme', 11 );

function remove_support_from_child_theme() {
    remove_theme_support( 'custom-header' );
}

function custom_post_type() {
    $labels = array(
        'name' => 'People',
        'singular_name' => 'Person',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Person',
        'edit_item' => 'Edit Person',
        'new_item' => 'New Person',
        'all_items' => 'All People',
        'view_item' => 'View Person',
        'search_items' => 'Search People',
        'not_found' =>  'No people found',
        'not_found_in_trash' => 'No people found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'People'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'people' ),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'taxonomies' => array('category'),
        'supports' => array( 'title', 'author', 'thumbnail', 'page-attributes' )
    );

    register_post_type( 'person', $args );
}
add_action( 'init', 'custom_post_type' );


function change_default_title( $title ){
    $screen = get_current_screen();
    if ( 'person' == $screen->post_type ){
        $title = 'Enter full name here';
    }
    return $title;
}
add_filter( 'enter_title_here', 'change_default_title' );

/*
 * Tried to get rid of Title field and set post_title and post_name based on first and last name. It conflicted with
 * the Simple Page Ordering plugin.
function custom_post_type_title ( $post_id ) {
    global $wpdb;
    if ( get_post_type( $post_id ) == 'person' ) {
        $title = stripslashes(trim(get_field('first_name') . ' ' . get_field('last_name')));
        $name = sanitize_title_with_dashes($title);
        $name = wp_unique_post_slug( $name, $post_id, get_post_status($post_id), 'person', get_post($post_id)->post_parent );
        $where = array( 'ID' => $post_id );
        $wpdb->update( $wpdb->posts, array( 'post_title' => $title, 'post_name' => $name ), $where );
    }
}
add_action( 'save_post', 'custom_post_type_title' );
*/

// Include people on category archive pages
function include_people($query) {
    if ( is_category() ) {
        if (! get_query_var('post_type')) {
            $query->set('post_type',array('post','person'));
            return $query;
        }
    }
}
add_filter('pre_get_posts', 'include_people');

// Set the_content to the bio for people for archive page purposes
function person_content($content) {
    global $post;
    if ($post->post_type == 'person') {
        $content = get_field('bio');
    }
    return $content;
}
add_filter('the_content', 'person_content', 0);


/**
 *  Install Add-ons
 *
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */

// Add-ons
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_people',
        'title' => 'People',
        'fields' => array (
            array (
                'key' => 'field_52226ba4c472f',
                'label' => 'Title',
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52226bd9c4730',
                'label' => 'Email',
                'name' => 'email',
                'type' => 'email',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array (
                'key' => 'field_52226bf5c4731',
                'label' => 'Bio',
                'name' => 'bio',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'person',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'format',
                6 => 'tags',
                7 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}


// Don't show author's name with entry meta
function twentythirteen_entry_meta() {
    if ( is_sticky() && is_home() && ! is_paged() )
        echo '<span class="featured-post">' . __( 'Sticky', 'twentythirteen' ) . '</span>';

    if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
        twentythirteen_entry_date();

    // Translators: used between list items, there is a space after the comma.
    $categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
    if ( $categories_list ) {
        echo '<span class="categories-links">' . $categories_list . '</span>';
    }

    // Translators: used between list items, there is a space after the comma.
    $tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
    if ( $tag_list ) {
        echo '<span class="tags-links">' . $tag_list . '</span>';
    }
}