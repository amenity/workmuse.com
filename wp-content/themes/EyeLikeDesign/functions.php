<?php
/**
 * EyeLikeDesign functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, eyelikedesign_themesetup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'eyelikedesign_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */

if ( ! defined( '__DIR__' ) ) define( '__DIR__' , dirname( __FILE__ ) );

define( 'FOUNDATION_VERSION', '3.2.5' ); 	// Version of ZURB Foundation

if ( ! isset( $content_width ) )
	$content_width = 657;

/**
 * Return the current theme version or parent theme version
 *
 * @since  EyeLikeDesign 0.6.0
 *
 * @param  boolean $parent By default we get the parent theme
 * @return int     Version of the theme
 */
function eyelikedesign_get_theme_version( $parent = true ) {

	// Name of the parent theme forder
	$stylesheet = 'eyelikedesign';

	if ( ! $parent ) {
		$stylesheet = get_stylesheet();
	}
	// Get the current theme with the new WP_Theme_API
	$current_theme = wp_get_theme( $stylesheet );

	return $current_theme->Version;
}

/**
 * We add our own nice functions to the theme if you want to change let's say eld-scripts.php
 * just create your own /includes/eld-scripts.php in your child theme and it get's overloaded.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
require( get_template_directory() . '/includes/eld-custom-header.php' );	// optional custom header support
require( get_template_directory() . '/includes/eld-foundation.php' ); 		// make foundation work in WordPress
require( get_template_directory() . '/includes/eld-scripts.php' ); 			// register the scripts we need the correct way
require( get_template_directory() . '/includes/eld-shortcodes.php' ); 		// we got wonderful shortcodes for you
require( get_template_directory() . '/includes/eld-mce.php' ); 				// using the power of tinyMCE to add more stuff for you to layout
require( get_template_directory() . '/includes/eld-plugin-support.php' );	// Support for your beloved plugins

/**
 * Add some love to the footer, of course you can replace that:
 * <code>
 * remove_action( 'eyelikedesign_credits', 'eyelikedesign_sample_credits' );
 * </code>
 */
add_action( 'eyelikedesign_credits', 'eyelikedesign_sample_credits' );

function eyelikedesign_sample_credits() {
	_e( '<p>Site by: <a href="http://eyelikedesign.com/" title="eyelikedesign Themes">EyeLikeDesign</a>.</p>', 'eyelikedesign' );
}

/**
 * Tell WordPress to run eyelikedesign_themesetup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'eyelikedesign_themesetup' );

if ( ! function_exists( 'eyelikedesign_themesetup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override eyelikedesign_themesetup() in a child theme, add your own eyelikedesign_themesetup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since EyeLikeDesign 0.1.0
 */
function eyelikedesign_themesetup() {
	/* Make EyeLikeDesign available for translation.
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on EyeLikeDesign, use a find and replace
	 * to change 'required' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'eyelikedesign', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in two locations by default.
	add_theme_support('menus');

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'eyelikedesign' ),
		'secondary' => __( 'Secondary Menu', 'eyelikedesign' )
	) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'link', 'status', 'quote', 'image' ) );

	// Add support for custom backgrounds. (The wp-head-callback is to make sure nothing happens, when we remove the action in the child theme)
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff', 'wp-head-callback' => '_custom_background_cb' ) );

	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );

}
endif; // eyelikedesign_setup

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since EyeLikeDesign 0.5.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function eyelikedesign_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'eyelikedesign' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'eyelikedesign_wp_title', 10, 2 );


/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function eyelikedesign_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'eyelikedesign_excerpt_length' );

if ( ! function_exists( 'eyelikedesign_continue_reading_link' ) ) :
/**
 * Returns a "Continue Reading" link for excerpts
 */
function eyelikedesign_continue_reading_link() {
	return ' <a class="read-more" href="'. esc_url( get_permalink() ) . '">' . __( '&hellip; Continue reading &rarr;', 'eyelikedesign' ) . '</a>';
}
endif;

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and eyelikedesign_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function eyelikedesign_auto_excerpt_more( $more ) {
	return eyelikedesign_continue_reading_link();
}
add_filter( 'excerpt_more', 'eyelikedesign_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function eyelikedesign_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= eyelikedesign_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'eyelikedesign_custom_excerpt_more' );

function eyelikedesign_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'eyelikedesign' ),
		'id' => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'eyelikedesign' ),
		'id' => 'sidebar-footer-1',
		'description' => __( 'An optional widget area for your site footer', 'eyelikedesign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'eyelikedesign' ),
		'id' => 'sidebar-footer-2',
		'description' => __( 'An optional widget area for your site footer', 'eyelikedesign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'eyelikedesign' ),
		'id' => 'sidebar-footer-3',
		'description' => __( 'An optional widget area for your site footer', 'eyelikedesign' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );

}
add_action( 'widgets_init', 'eyelikedesign_widgets_init' );

if ( ! function_exists( 'eyelikedesign_single_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function eyelikedesign_single_content_nav( ) {
	?>
	<nav class="nav-single">
		<h3 class="assistive-text"><?php _e( 'Post navigation', 'eyelikedesign' ); ?></h3>
		<span class="nav-previous"><?php previous_post_link( '%link', '&larr; %title' ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', '%title &rarr;' ); ?></span>
	</nav><!-- .nav-single -->
	<?php
}
endif; // eyelikedesign_content_nav

/**
 * Manage the layout of the footer sidebars, get it? Pretty clever huh?
 * Just kidding ;-)
 *
 * @return string
 * @since EyeLikeDesign 0.1.0
 **/
function eyelikedesign_footer_sidebar_columns() {

	// default value
	$eyelikedesign_columns = 'four columns';

	// only the first sidebar is active, go full-width
	if (     is_active_sidebar( 'sidebar-footer-1' )
		&& ! is_active_sidebar( 'sidebar-footer-2' )
		&& ! is_active_sidebar( 'sidebar-footer-3') ) {
		$eyelikedesign_columns = 'twelve columns';
	}
	// the first one is disabled, go half-half
	else if (	! is_active_sidebar( 'sidebar-footer-1' )
			 &&   is_active_sidebar( 'sidebar-footer-2')
			 &&   is_active_sidebar( 'sidebar-footer-3' ) ) {
		$eyelikedesign_columns = 'six columns';
	}
	// the last one is disabled, go eight-four
	else if ( 	! is_active_sidebar( 'sidebar-footer-3' )
			 &&   is_active_sidebar( 'sidebar-footer-2' )
			 &&   is_active_sidebar( 'sidebar-footer-1' ) ) {
		$eyelikedesign_columns = 'eight columns';
	}
	// the middle on is disabled, go four-eight
	else if ( 	! is_active_sidebar( 'sidebar-footer-2' )
			&&    is_active_sidebar( 'sidebar-footer-3' )
			&& 	  is_active_sidebar( 'sidebar-footer-1' ) ) {
		$eyelikedesign_columns = 'four columns reverse';
	}

	return $eyelikedesign_columns;
}

if ( ! function_exists( 'eyelikedesign_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own eyelikedesign_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since EyeLikeDesign 0.1.0
 */
function eyelikedesign_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'eyelikedesign' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'eyelikedesign' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment panel">
			<header class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 48;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '<h6>%1$s on %2$s <span class="says">said:</span></h6>', 'eyelikedesign' ),
							sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s at %2$s', 'eyelikedesign' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'eyelikedesign' ); ?></em>
				<?php endif; ?>

			</header>

			<div class="comment-content"><?php comment_text(); ?> <?php edit_comment_link( __( 'Edit', 'eyelikedesign' ), '<span class="edit-link">', '</span>' ); ?></div>

			<div class="comment-reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply <span>&darr;</span>', 'eyelikedesign' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for eyelikedesign_comment()

if ( ! function_exists( 'eyelikedesign_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own eyelikedesign_posted_on to override in a child theme
 *
 * @since EyeLikeDesign 0.3.0
 */
function eyelikedesign_posted_on() {
	printf( __( '<h4><time class="entry-date" datetime="%3$s">%4$s</time></h4>', 'eyelikedesign' ),
		esc_url( get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')) ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'eyelikedesign' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds two classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 *
 * @since EyeLikeDesign 0.1.0
 */
function eyelikedesign_body_classes( $classes ) {

	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	if ( is_singular() && ! is_home() && ! is_page_template( 'fulldwidth-page.php' ) && ! is_page_template( 'left-sidebar-page.php' ) )
		$classes[] = 'singular';

	if ( is_page_template( 'page-templates/off-canvas-page.php' ) ) {
		$classes[] = 'off-canvas';
	}

	return $classes;
}
add_filter( 'body_class', 'eyelikedesign_body_classes' );


if ( ! function_exists( 'eyelikedesign_archive_title' ) ) :
/**
 * Nice archive titles
 *
 * @return string
 * @since EyeLikeDesign 0.1.0
 **/

remove_filter('term_description','wpautop');

function eyelikedesign_archive_title () {
	if ( is_category() ) {
		$category_description = category_description();
		echo $panelbool = ! empty( $category_description ) ? '<div class="panel clearfix">' : ''; ?>
			<header class="page-header">
				<h3 class="page-title"><?php
					printf( __( 'Category Archives: %s', 'eyelikedesign' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h3>
				<?php
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<p class="category-archive-meta lead">' . $category_description . '</p>' );
				?>
			</header>
		<?php echo $panelbool = ! empty( $category_description ) ? '</div>' : '';
	}

	if ( is_tag() ) {
		$tag_description = tag_description();
		echo $panelbool = ! empty( $tag_description ) ? '<div class="panel clearfix">' : ''; ?>
			<header class="page-header">
				<h3 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'eyelikedesign' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h3>
				<?php
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<p class="lead tag-archive-meta">' . $tag_description . '</p>' );
					?>
			</header>
		<?php echo $panelbool = ! empty( $tag_description ) ? '</div>' : '';
	}

	if ( is_author() ) {
		// If a user has filled out their description, show a bio on their entries.
		if ( get_the_author_meta( 'description' ) ) : ?>
		<header class="page-header">
			<div id="author-info" class="panel clearfix">
				<h3 class="page-title author"><?php printf( __( 'Author Archives: %s', 'eyelikedesign' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h3>
				<div id="author-avatar">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'eyelikedesign_author_bio_avatar_size', 72 ) ); ?>
				</div><!-- #author-avatar -->
				<div id="author-description">
					<h4><?php printf( __( 'About %s', 'eyelikedesign' ), get_the_author() ); ?></h4>
					<p class="lead"><?php the_author_meta( 'description' ); ?></p>
				</div><!-- #author-description	-->
			</div><!-- #entry-author-info -->
		<?php else : ?>
		<header class="page-header">
			<h3 class="page-title author"><?php printf( __( 'Author Archives: %s', 'eyelikedesign' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h3>
		</header>
		<?php endif;
	}
	if ( is_archive() && !is_category() && !is_tag() ) { ?>
		<header class="page-header">
			<h3 class="page-title">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: %s', 'eyelikedesign' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: %s', 'eyelikedesign' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'eyelikedesign' ) ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: %s', 'eyelikedesign' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'eyelikedesign' ) ) . '</span>' ); ?>
				<?php elseif ( ! is_author() && ! is_category() && ! is_tag() ) : ?>
					<?php _e( 'Blog Archives', 'eyelikedesign' ); ?>
				<?php endif; ?>
			</h3>
		</header><?php
	}
	if ( is_search() ) {
		?>
		<header class="page-header">
			<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'eyelikedesign' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
		</header>
		<?php
	}
}
endif;
?>
<?php
/**
 * Plugin Name: r+ Columns Shortcode
 * Plugin URI: http://themes.required.ch/
 * Description: A [column] shortcode plugin for the required+ Foundation parent theme and child themes, based on <a href="http://themehybrid.com/plugins/grid-columns">GridColumns by Justin Tadlock</a>.
 * Version: 0.1.2
 * Author: required+ Team
 * Author URI: http://required.ch
 *
 * @package   required+ Foundation
 * @version   0.1.2
 * @author    Silvan Hagen <silvan@required.ch>
 * @copyright Copyright (c) 2012, Silvan Hagen
 * @link      http://themes.required.ch/theme-features/shortcodes/
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/**
 * REQ_Grid_Columns Shortcode Class
 *
 * @version 0.1.0
 */
class REQ_Column_Shortcode {

    /**
     * The columns in our grid
     *
     * @since  0.1.0
     * @access public
     * @var    int
     */
    public $grid = 12;

    /**
     * The current total number of columns in the grid.
     *
     * @since  0.1.0
     * @access public
     * @var    int
     */
    public $columns = 0;

    /**
     * Whether we're viewing the first column.
     *
     * @since  0.1.0
     * @access public
     * @var    bool
     */
    public $is_first_column = true;

    /**
     * Whether we're viewing the last column.
     *
     * @since  0.1.0
     * @access public
     * @var    bool
     */
    public $is_last_column = false;

    /**
     * Sets up our actions/filters.
     *
     * @since 0.1.0
     * @access public
     * @return void
     */
    public function __construct() {

        /* Register shortcodes on 'init'. */
        add_action( 'init', array( &$this, 'register_shortcode' ) );

        /* Apply filters to the column content. */
        add_filter( 'req_column_content', 'wpautop' );
        add_filter( 'req_column_content', 'shortcode_unautop' );
        add_filter( 'req_column_content', 'do_shortcode' );
    }

    /**
     * Convert int into a word for our column classes
     *
     * @since  0.1.0
     * @access protected
     * @param  int $int
     * @return string $word
     */
    protected function convert_int_to_word( $int ) {

        // Make sure it's an integer
        absint( $int );

        switch( $int ) {

            case 1:     $word = "one"; break;
            case 2:     $word = "two"; break;
            case 3:     $word = "three"; break;
            case 4:     $word = "four"; break;
            case 5:     $word = "five"; break;
            case 6:     $word = "six"; break;
            case 7:     $word = "seven"; break;
            case 8:     $word = "eight"; break;
            case 9:     $word = "nine"; break;
            case 10:    $word = "ten"; break;
            case 11:    $word = "eleven"; break;
            case 12:    $word = "twelve"; break;
            case 0:
            default:
                        $word = "zero"; break;
        }
        return $word;
    }

    /**
     * Convert word to int for legacy support of old colmun shortcodes
     *
     * @since  0.1.0
     * @access protected
     * @param  string $word
     * @return int $int
     */
    protected function convert_word_to_int( $word ) {

        switch( $word ) {

            case "one":         $int = 1; break;
            case "two":         $int = 2; break;
            case "three":       $int = 3; break;
            case "four":        $int = 4; break;
            case "five":        $int = 5; break;
            case "six":         $int = 6; break;
            case "seven":       $int = 7; break;
            case "eight":       $int = 8; break;
            case "nine":        $int = 9; break;
            case "ten":         $int = 10; break;
            case "eleven":      $int = 11; break;
            case "twelve":      $int = 12; break;
            case "zero":
            default:
                                $int = 0; break;

        }
        return $int;
    }

    /**
     * Registers the [column] shortcode.
     *
     * @since  0.1.0
     * @access public
     * @return void
     */
    public function register_shortcode() {
        add_shortcode( 'column', array( &$this, 'do_shortcode' ) );
    }

    /**
     * Returns the content of the column shortcode.
     *
     * @since  0.1.0
     * @access public
     * @param  array  $attr The user-inputted arguments.
     * @param  string $content The content to wrap in a shortcode.
     * @return string
     */
    public function do_shortcode( $attr, $content = null ) {

        /* If there's no content, just return back what we got. */
        if ( is_null( $content ) )
            return $content;

        /* Set up the default variables. */
        $output = '';
        $row_classes = array();
        $column_classes = array();

        /* Set up the default arguments. */
        $defaults = apply_filters(
            'req_column_defaults',
            array(
                'columns'  => 1,
                'offset'  => 0,
                'class' => ''
            )
        );

        /* Parse the arguments. */
        $attr = shortcode_atts( $defaults, $attr );

        /* Allow devs to filter the arguments. */
        $attr = apply_filters( 'req_column_args', $attr );

        /* Legacy support for old column shortcode */
        if ( !is_numeric( $attr['columns'] ) )
            $attr['columns'] = $this->convert_word_to_int( $attr['columns'] );

        /* Columns cannot be greater than the grid. */
        $attr['columns'] = ( $this->grid >= $attr['columns'] ) ? absint( $attr['columns'] ) : 3;

        /* The offset argument should always be less than the grid. */
        $attr['offset'] = ( $this->grid > $attr['offset'] ) ? absint( $attr['offset'] ) : 0;

        /* Add to the total $columns. */
        $this->columns = $this->columns + $attr['columns'] + $attr['offset'];

        /* Column classes. */
        $column_classes[] = 'columns';
        $column_classes[] = $this->convert_int_to_word( $attr['columns'] );
        if ( $attr['offset'] !== 0 ) // Offset is only necessary if it's not 0
            $column_classes[] = "offset-by-{$this->convert_int_to_word( $attr['offset'] )}";

        /* Add user-input custom class(es). */
        if ( !empty( $attr['class'] ) ) {
            if ( !is_array( $attr['class'] ) )
                $attr['class'] = preg_split( '#\s+#', $attr['class'] );
            $column_classes = array_merge( $column_classes, $attr['class'] );
        }

        /* If the $span property is greater than (shouldn't be) or equal to the $grid property. */
        if ( $this->columns >= $this->grid ) {

            /* Set the $is_last_column property to true. */
            $this->is_last_column = true;
        }

        /* Object properties. */
        $object_vars = get_object_vars( $this );

        /* Allow devs to create custom classes. */
        $column_classes = apply_filters( 'req_column_class', $column_classes, $attr, $object_vars );

        /* Sanitize and join all classes. */
        $column_class = join( ' ', array_map( 'sanitize_html_class', array_unique( $column_classes ) ) );

        /* Output */

        /* If this is the first column. */
        if ( $this->is_first_column ) {

            /* Open a wrapper <div> to contain the columns. */
            $output .= '<div class="row">';

            /* Set the $is_first_column property back to false. */
            $this->is_first_column = false;
        }

        /* Add the current column to the output. */
        $output .= '<div class="' . $column_class . '">' . apply_filters( 'req_column_content', $content ) . '</div>';

        /* If this is the last column. */
        if ( $this->is_last_column ) {

            /* Close the wrapper. */
            $output .= '</div>';

            /* Reset the properties that have been changed. */
            $this->reset();
        }

        /* Return the output of the column. */
        return apply_filters( 'req_column', $output );
    }

    /**
     * Resets the properties to their original states.
     *
     * @since  0.1.0
     * @access public
     * @return void
     */
    public function reset() {

        foreach ( get_class_vars( __CLASS__ ) as $name => $default )
            $this->$name = $default;
    }
}
/**
 * If you prefer the shortcode by http://themehybrid.com/plugins/grid-columns
 * please go ahead and use it. We don't stop you!
 */
if ( ! class_exists( 'Grid_Columns' ) )
    new REQ_Column_Shortcode();

function sky_oembed_filter( $return, $data, $url ) {
 	$return = str_replace('frameborder="0" allowfullscreen', 'style="border: none"', $return);
	return $return;
}
add_filter('oembed_dataparse', 'sky_oembed_filter', 90, 3 );