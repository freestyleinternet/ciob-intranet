<?php

/****************************************
Theme Setup
*****************************************/

require_once( get_template_directory() . '/assets/theme-helpers/init.php' );
require_once( get_template_directory() . '/assets/theme-helpers/theme-helpers.php' );
require_once( get_template_directory() . '/assets/theme-helpers/theme-functions.php' );


/****************************************
Require Plugins
*****************************************/

require_once( get_template_directory() . '/assets/theme-helpers/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/assets/theme-helpers/theme-require-plugins.php' );

add_action( 'tgmpa_register', 'register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/


/**
 * FAdd separator for menu items
 */
class Main_Menu_Walker extends Walker_Nav_Menu{

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";

        if ($depth == 0)
            $output .="<li class='separator'>|</li>\n";        
    }
}
function menu_remove_last_separator($items){

    $separator = "<li class='separator'>|</li>";
    $pos = strrpos($items, $separator);

    if ($pos) 
        $items = substr_replace($items, '', $pos, strlen($separator));

    return $items;
}

add_filter( 'wp_nav_menu_items','menu_remove_last_separator');


/**
 * Stop content box adding p tags around images ACF Editor
 */
function filter_ptags_on_images($content)
{
    $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    return preg_replace('/<p>\s*(<iframe .*>*.<\/iframe>)\s*<\/p>/iU', '\1', $content);
}
add_filter('acf_the_content', 'filter_ptags_on_images');


/**
 * Define custom post type capabilities for use with Members
 */
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}


/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}
?>