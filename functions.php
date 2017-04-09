<?php
/**
 * thetirral functions and definitions
 *
 * @package thetirral
 */




if ( class_exists( 'Redux' ) && file_exists( get_template_directory() . '/inc/config.php' ) ) {
	require_once( get_template_directory() . '/inc/config.php' );
}


global $tirral_global;
$opt_name = 'tirral_global';



if ( ! function_exists( 'thetirral_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function thetirral_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on thetirral, use a find and replace
	 * to change 'thetirral' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'thetirral', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	//Connect all available posts formats
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'chat', 'audio') );
		
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'thetirral' ),
	) );
    
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'thetirral_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'thetirral_setup' );

/**
* Enable support for Post Thumbnails on posts and pages.
*
* @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('thetirral-large-thumb', 1400);
	add_image_size('thetirral-medium-thumb', 550, 400, true);
	add_image_size('thetirral-small-thumb', 230);
	add_image_size('thetirral-service-thumb', 350);
	add_image_size('thetirral-mas-thumb', 480);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function thetirral_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'thetirral_content_width', 640 );
}
add_action( 'after_setup_theme', 'thetirral_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function thetirral_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'thetirral' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'thetirral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar-shop', 'thetirral' ),
		'id'            => 'shop',
		'description'   => esc_html__( 'Add widgets here.', 'thetirral' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	
	
//Footer widget areas
global $tirral_global;	
if($tirral_global['opt-footer-option'] == 1) : 
	$widget_areas=1;
 endif;
		
if($tirral_global['opt-footer-option'] == 2) : 
	$widget_areas=2;
 endif;	
if($tirral_global['opt-footer-option'] == 3) : 
	$widget_areas=3;
 endif;		
	
	
//$widget_areas = get_theme_mod('footer_widget_areas', '2');
for ($i=1; $i<=$widget_areas; $i++) {		
		register_sidebar( array(
			'name'          => __( 'Footer ', 'thetirral' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-area">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'thetirral_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function thetirral_scripts() {
	
wp_enqueue_style( 'thetirral-style', get_stylesheet_uri() );
wp_enqueue_style( 'thetirral-style-bootstrap', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array(),  true );
wp_enqueue_style( 'thetirral-style-flaticons', get_template_directory_uri() . '/lib/flaticons/flaticon.css', array(),  true );
wp_enqueue_style( 'thetirral-style-awesome', get_template_directory_uri() . '/lib/font-awesome/css/font-awesome.css', array(),  true );
wp_enqueue_style( 'thetirral-style-custom-scrollbar', get_template_directory_uri() . '/lib/custom-scrollbar/jquery.mCustomScrollbar.min.css', array(),  true );
wp_enqueue_style( 'thetirral-style-thetirral', get_template_directory_uri() . '/sass/thetirral.css', array(),  true );

	
wp_enqueue_script( 'thetirral-js-jquery', get_template_directory_uri() . '/lib/jquery/jquery-3.1.1.min.js', array(), '20151214', true );	
wp_enqueue_script( 'thetirral-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
wp_enqueue_script( 'thetirral-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151216', true );

wp_enqueue_script( 'thetirral-js-bootstrap', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.min.js', array(), '20151218', true );
wp_enqueue_script( 'thetirral-js-thetirral', get_template_directory_uri() . '/js/thetirral.js', array(), '20151219', true );
wp_enqueue_script( 'thetirral-js-customscrollbar', get_template_directory_uri() . '/lib/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js', array(), '20151220', true );
wp_enqueue_script( 'thetirral-js-preloader', get_template_directory_uri() . '/js/preloader.js', array(), '20151221', true );
wp_enqueue_script( 'thetirral-js-textcut', get_template_directory_uri() . '/js/textcut.js', array(), '20151222', true );	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'thetirral_scripts' );


/**
 * In header section of site
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'thetirral' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/woocommerce.php';

/**
 *TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/plugins/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'thetirral_recommend_plugin' );
function thetirral_recommend_plugin() {
	 $plugins[] = array(
            'name'               => 'Redux',
            'slug'               => 'redux-framework',
            'required'           => false,
    );
	


    tgmpa( $plugins);
}



/**
* Declare WooCommerce support
*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}































