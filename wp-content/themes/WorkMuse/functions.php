<?php
/**
 * This makes the child theme work. If you need any
 * additional features or let's say menus, do it here.
 *
 * @return void
 */
function eyelikedesign_starter_themesetup() {

	load_child_theme_textdomain( 'eyelikedesign', get_stylesheet_directory() . '/languages' );

	// Register an additional Menu Location
	register_nav_menus( array(
		'meta' => __( 'Meta Menu', 'eyelikedesign' )
	) );

	// Add support for custom backgrounds and overwrite the parent backgorund color
	add_theme_support( 'custom-background', array( 'default-color' => 'f7f7f7' ) );

}
add_action( 'after_setup_theme', 'eyelikedesign_starter_themesetup' );


/**
 * With the following function you can disable theme features
 * used by the parent theme without breaking anything. Read the
 * comments on each and follow the link, if you happen to not
 * know what the function is for. Remove the // in front of the
 * remove_theme_support('...'); calls to make them execute.
 *
 * @return void
 */
function eyelikedesign_starter_after_parent_theme_setup() {

	/**
	 * Hack added: 2012-10-04, Silvan Hagen
	 *
	 * This is a hack, to calm down PHP Notice, since
	 * I'm not sure if it's a bug in WordPress or my
	 * bad I'll leave it here: http://wordpress.org/support/topic/undefined-index-custom_image_header-in-after_setup_theme-of-child-theme
	 */
	if ( ! isset( $GLOBALS['custom_image_header'] ) )
		$GLOBALS['custom_image_header'] = array();

	if ( ! isset( $GLOBALS['custom_background'] ) )
		$GLOBALS['custom_background'] = array();

	// Remove custom header support: http://codex.wordpress.org/Custom_Headers
	//remove_theme_support( 'custom-header' );

	// Remove support for post formats: http://codex.wordpress.org/Post_Formats
	//remove_theme_support( 'post-formats' );

	// Remove featured images support: http://codex.wordpress.org/Post_Thumbnails
	//remove_theme_support( 'post-thumbnails' );

	// Remove custom background support: http://codex.wordpress.org/Custom_Backgrounds
	//remove_theme_support( 'custom-background' );

	// Remove automatic feed links support: http://codex.wordpress.org/Automatic_Feed_Links
	//remove_theme_support( 'automatic-feed-links' );

	// Remove editor styles: http://codex.wordpress.org/Editor_Style
	//remove_editor_styles();

	// Remove a menu from the theme: http://codex.wordpress.org/Navigation_Menus
	//unregister_nav_menu( 'secondary' );

}
add_action( 'after_setup_theme', 'eyelikedesign_starter_after_parent_theme_setup', 11 );

/**
 * Add our theme specific js file and some Google Fonts
 * @return void
 */
function eyelikedesign_starter_scripts() {

	/**
	 * Registers the child-theme.js
	 *
	 * Remove if you don't need this file,
	 * it's empty by default.
	 */
	wp_enqueue_script(
		'child-theme-js',
		get_stylesheet_directory_uri() . '/javascripts/child-theme.js',
		array( 'theme-js' ),
		eyelikedesign_get_theme_version( false ),
		true
	);

	/**
	 * Registers the app.css
	 *
	 * If you don't need it, remove it.
	 * The file is empty by default.
	 */
	wp_register_style(
        'app-css', //handle
        get_stylesheet_directory_uri() . '/stylesheets/app.css',
        array( 'foundation-css' ),	// needs foundation
        eyelikedesign_get_theme_version( false ) //version
  	);
  	wp_enqueue_style( 'app-css' );
}

remove_action( 'eyelikedesign_credits', 'eyelikedesign_sample_credits' );

add_action('wp_enqueue_scripts', 'eyelikedesign_starter_scripts');

/**
 * Overwrite the default continue reading link
 *
 * This function is an example on how to overwrite
 * the parent theme function to create continue reading
 * links.
 *
 * @return string HTML link with text and permalink to the post/page/cpt
 */
function eyelikedesign_continue_reading_link() {
	return ' <a class="read-more" href="'. esc_url( get_permalink() ) . '">' . __( ' Read on! &rarr;', 'eyelikedesign' ) . '</a>';
}

/**
 * Overwrite the defaults of the Orbit shortcode script
 *
 * Accepts all the parameters from http://foundation.zurb.com/docs/orbit.php#optCode
 * to customize the options for the orbit shortcode plugin.
 *
 * @param  array $args default args
 * @return array       your args
 */
function eyelikedesign_orbit_script_args( $defaults ) {
	$args = array(
		'animation' 	=> 'fade',
		'advanceSpeed' 	=> 8000,
	);
	return wp_parse_args( $args, $defaults );
}
add_filter( 'eld_orbit_script_args', 'eyelikedesign_orbit_script_args' );

/**
 *	Pare down styles in CKEditor
 */
function wpa_45815($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpa_45815');

//Start ELD - KD Edits

// Register custom post type for testimonials
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonials', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'search_items'          => __( 'Search Testimonial', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Testimonials list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonial', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('thumbnail', 'title', 'editor', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'custom_post_type', 0 );
//Sidebar Link CPT
function sidebar_link_post_type() {

	$labels = array(
		'name'                  => _x( 'Sidebar Links', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Sidebar Link', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Sidebar Links', 'text_domain' ),
		'name_admin_bar'        => __( 'Sidebar Links', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Sidebar Link:', 'text_domain' ),
		'all_items'             => __( 'All Sidebar Links', 'text_domain' ),
		'add_new_item'          => __( 'Add New Sidebar Link', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Sidebar Link', 'text_domain' ),
		'edit_item'             => __( 'Edit Sidebar Link', 'text_domain' ),
		'update_item'           => __( 'Update Sidebar Link', 'text_domain' ),
		'view_item'             => __( 'View Sidebar Link', 'text_domain' ),
		'search_items'          => __( 'Search Sidebar Link', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'items_list'            => __( 'Sidebar Links list', 'text_domain' ),
		'items_list_navigation' => __( 'Sidebar Links list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Sidebar Links list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Sidebar Link', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'Sidebar Link', $args );

}
add_action( 'init', 'sidebar_link_post_type', 0 );


//New Sidebar

function page_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'eyelikedesign' ),
		'id' => 'sidebar-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	}
add_action( 'widgets_init', 'page_widgets_init' );

//Custom media sizes
function featured_image_crop_setup() {
	add_image_size ( 'featured', 2000, 600, true );
}
add_action( 'after_setup_theme', 'featured_image_crop_setup' );

function case_studies() {

	$labels = array(
		'name'                  => _x( 'Case Studies', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Case Studies', 'text_domain' ),
		'name_admin_bar'        => __( 'Case Studies', 'text_domain' ),
		'archives'              => __( 'Case Study Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Case Study:', 'text_domain' ),
		'all_items'             => __( 'All Case Studies', 'text_domain' ),
		'add_new_item'          => __( 'Add New Case Study', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Case Study', 'text_domain' ),
		'edit_item'             => __( 'Edit Case Study', 'text_domain' ),
		'update_item'           => __( 'Update Case Study', 'text_domain' ),
		'view_item'             => __( 'View Case Study', 'text_domain' ),
		'search_items'          => __( 'Search Case Study', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Case Study', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Case Study', 'text_domain' ),
		'items_list'            => __( 'Case Studies list', 'text_domain' ),
		'items_list_navigation' => __( 'Case Studies list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Case Studies list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Case Study', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('thumbnail', 'title', 'editor', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'case-studies', $args );

}
add_action( 'init', 'case_studies', 0 );