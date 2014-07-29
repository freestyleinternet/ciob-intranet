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
 * Truncate the content
 */
function truncate($string, $limit, $break=" ", $pad="...")
{
	// Remove any formatting first
	$string = strip_tags($string);
	if(strlen($string) <= $limit) return $string;
	if(false !== ($breakpoint = strpos($string, $break, $limit)))
	{
		if($breakpoint < strlen($string) - 1)
		{
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	}
	return $string;
}

/**
 * Allow SVG file upload in Wordpress Admin area
 */
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

/**
 * Add custom image sizes
 */
function custom_image_sizes() {
    add_theme_support('post-thumbnails');
	add_image_size('logo', 206, 90, TRUE);
	add_image_size('home-latest', 467, 9999, TRUE);
	add_image_size('news', 300, 152, TRUE);
}
add_action('after_setup_theme', 'custom_image_sizes');

/**
 * Add custom brand colours to colour picker in editor
 */
function my_mce4_options( $init ) {
$default_colours = '
    "000000", "Black",        "993300", "Burnt orange", "333300", "Dark olive",   "003300", "Dark green",   "003366", "Dark azure",   "000080", "Navy Blue",      "333399", "Indigo",       "333333", "Very dark gray", 
    "800000", "Maroon",       "FF6600", "Orange",       "808000", "Olive",        "008000", "Green",        "008080", "Teal",         "0000FF", "Blue",           "666699", "Grayish blue", "808080", "Gray", 
    "FF0000", "Red",          "FF9900", "Amber",        "99CC00", "Yellow green", "339966", "Sea green",    "33CCCC", "Turquoise",    "3366FF", "Royal blue",     "800080", "Purple",       "999999", "Medium gray", 
    "FF00FF", "Magenta",      "FFCC00", "Gold",         "FFFF00", "Yellow",       "00FF00", "Lime",         "00FFFF", "Aqua",         "00CCFF", "Sky blue",       "993366", "Brown",        "C0C0C0", "Silver", 
    "FF99CC", "Pink",         "FFCC99", "Peach",        "FFFF99", "Light yellow", "CCFFCC", "Pale green",   "CCFFFF", "Pale cyan",    "99CCFF", "Light sky blue", "CC99FF", "Plum",         "FFFFFF", "White"
';
$custom_colours = '
    "4f2d5b", "Brand Purple",
	"f9a435", "Brand Orange",
	"3b3b3b", "Brand Text Colour"
';
$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']'; // build colour grid default+custom colors
$init['textcolor_rows'] = 6; // enable 6th row for custom colours in grid
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

/**
 * Add separator for menu items
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