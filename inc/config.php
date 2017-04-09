<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "tirral_global";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );




    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }



    /*=== Dev mode disable ===*/
    function removeDemoModeLinkSell() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
        }
    }
    add_action('init', 'removeDemoModeLinkSell');




    /*=== Adding custom CSS for Theme Options design ===*/
    function addPanelCSS() {
        wp_register_style(
            'redux-custom-css',
            esc_url(get_template_directory_uri()) . '/inc/redux-custom-css.css',
            array( 'redux-admin-css' ), // Be sure to include redux-admin-css so it's appended after the core css is applied
            time(),
            'all'
        );
        wp_enqueue_style('redux-custom-css');
    }

    // This example assumes your opt_name is set to redux_demo, replace with your opt_name value
    add_action( 'init', 'addPanelCSS' );


















    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
             'menu_title'           => __( 'Tirral options', 'thetirral' ),
        'page_title'           => __( 'Theme Options', 'thetirral' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => get_template_directory_uri().'/img/molecule.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
//    $args['admin_bar_links'][] = array(
//        'id'    => 'redux-docs',
//        'href'  => 'http://docs.reduxframework.com/',
//        'title' => __( 'Documentation', 'thetirral' ),
//    );
//
//    $args['admin_bar_links'][] = array(
//        //'id'    => 'redux-support',
//        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
//        'title' => __( 'Support', 'thetirral' ),
//    );
//
//    $args['admin_bar_links'][] = array(
//        'id'    => 'redux-extensions',
//        'href'  => 'reduxframework.com/extensions',
//        'title' => __( 'Extensions', 'thetirral' ),
//    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
//    $args['share_icons'][] = array(
//        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
//        'title' => 'Visit us on GitHub',
//        'icon'  => 'el el-github'
//        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
//    );
//    $args['share_icons'][] = array(
//        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
//        'title' => 'Like us on Facebook',
//        'icon'  => 'el el-facebook'
//    );
//    $args['share_icons'][] = array(
//        'url'   => 'http://twitter.com/reduxframework',
//        'title' => 'Follow us on Twitter',
//        'icon'  => 'el el-twitter'
//    );
//    $args['share_icons'][] = array(
//        'url'   => 'http://www.linkedin.com/company/redux-framework',
//        'title' => 'Find us on LinkedIn',
//        'icon'  => 'el el-linkedin'
//    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'thetirral' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'thetirral' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'thetirral' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'thetirral' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thetirral' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'thetirral' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'thetirral' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'thetirral' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields


/*
	===================================
	THEME SETTINGS
	===================================
*/

Redux::setSection( $opt_name, array(
	'title'            => __( 'General Setting', 'thetirral' ),
	'id'               => 'settings',
	'desc'             => __( '', 'thetirral' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-adjust-alt'
) );


/*---------------------------------------
Subsection -- select main theme color
----------------------------------------*/
Redux::setSection( $opt_name, array(
	'title'            => __( 'Design', 'thetirral' ),
	'desc'             => __( 'Design settings for customization', 'thetirral'),
	'id'               => 'settings-color',
	'subsection'       => true,
	'customizer_width' => '700px',
	'fields'           => array(
                array(
                'id'       => 'opt-settings-color',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => __( 'Select main theme color', 'thetirral' ),
                'subtitle' => __( 'Pick main theme for the theme.', 'thetirral' ),
	            'transparent'     => false,
                'default'  => '#2095f2',
            )
      )
));

/*------------------------------------------------
Subsection --  post headers and text typography
-------------------------------------------------*/
Redux::setSection( $opt_name, array(
	'title'            => __( 'Post Typography', 'thetirral' ),
	'desc'             => __( 'Specify font properties for post', 'thetirral'),
	'id'               => 'typography',
	'subsection'       => true,
	'customizer_width' => '700px',
	'fields'           => array(
                array(
                'id'       => 'opt-typography-h1',
                'type'     => 'typography',
                'title'    => __( 'H1 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H1 font properties for post.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#000000',
                    'font-size'   => '44px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'center',
	                'line-height' => '64px',
                  )
                 ),
	            array(
                'id'       => 'opt-typography-h2',
                'type'     => 'typography',
                'title'    => __( 'H2 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H2 font properties for post.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#000000',
                    'font-size'   => '36px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'center',
	                'line-height' => '52px',
                  )
                 ),
	            array(
                'id'       => 'opt-typography-h3',
                'type'     => 'typography',
                'title'    => __( 'H3 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H3 font properties for post.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#000000',
                    'font-size'   => '32px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'center',
	                'line-height' => '36px',
                  )
                ),
		        array(
                'id'       => 'opt-typography-h4',
                'type'     => 'typography',
                'title'    => __( 'H4 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H4 font properties for post.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#000000',
                    'font-size'   => '25px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'center',
	                'line-height' => '28px',
                  )
                 ),
	       	    array(
                'id'       => 'opt-typography-h5',
                'type'     => 'typography',
                'title'    => __( 'H5 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H5 font properties for post.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#000000',
                    'font-size'   => '20px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'center',
	                'line-height' => '24px',
                  )
                 ),
		         array(
                'id'       => 'opt-typography-h6',
                'type'     => 'typography',
                'title'    => __( 'H6 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H6 font properties for post.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#000000',
                    'font-size'   => '18px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'center',
	                'line-height' => '20px',
                  )
                 ),
	            array(
                'id'       => 'opt-typography-p',
                'type'     => 'typography',
                'title'    => __( 'paragraph styles', 'thetirral' ),
                'subtitle' => __( 'Specify the paragraph font properties for post.', 'thetirral' ),
                'google'   => true,
	            'word-spacing'   => true,
	            'letter-spacing'   => true,
                'default'  => array(
                    'color'       => '#888888',
                    'font-size'   => '16px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'justify ',
	                'line-height' => '29px',
	                'word-spacing'=> '3px',
	                'letter-spacing'=> '1px',
                  )
              ),
          )
   ));


/*---------------------------------------
Subsection --  widgets area  typography
----------------------------------------*/
Redux::setSection( $opt_name, array(
	'title'            => __( 'Widgets Typography', 'thetirral' ),
	'desc'             => __( 'Specify font properties for widgets', 'thetirral'),
	'id'               => 'typography-widget',
	'subsection'       => true,
	'customizer_width' => '700px',
	'fields'           => array(
                array(
                'id'       => 'opt-typography-widget',
                'type'     => 'typography',
                'title'    => __( 'H2 styles', 'thetirral' ),
                'subtitle' => __( 'Specify the H2 font properties for widgets.', 'thetirral' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#888888',
                    'font-size'   => '22px',
                    'font-family' => 'LibreFranklin-Thin,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'left',
	                'line-height' => '20px',
                  )
                ),
	            array(
                'id'       => 'opt-typography-a',
                'type'     => 'typography',
                'title'    => __( 'link styles', 'thetirral' ),
                'subtitle' => __( 'Specify the link font properties for post.', 'thetirral' ),
                'google'   => true,
	            'word-spacing'   => true,
	            'letter-spacing'   => true,
                'default'  => array(
                    'color'       => '#888888',
                    'font-size'   => '13px',
                    'font-family' => 'LibreFranklin-Regular,sans-serif',
                    'font-weight' => 'Normal',
	                'text-align' => 'justify ',
	                'line-height' => '16px',
	                'word-spacing'=> '2px',
	                'letter-spacing'=> '0.5px',
                  )
            )
      )
   ));

/*
	===================================
	PRELOADER
	===================================
*/

Redux::setSection( $opt_name, array(
	'title'            => __( 'Page Preloader', 'thetirral' ),
	'desc'             => __( 'Display Page Loader', 'thetirral'),
	'id'               => 'preloader-settins',
	'customizer_width' => '700px',
	'icon'             => 'el el-screen',
	'fields'           => array(
			array(
			'id'       => 'opt-preloader-select',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Icon for Page Loader', 'thetirral'),
			'subtitle' => __('Upload your icon. It displays, when page is loading', 'thetirral'),
			'default'  => array(
			'url'=> get_template_directory_uri().'/img/animation.png')
            ),
	        array(
			'id'       => 'opt-preloader-bg-color',
			'type'     => 'color',
			'output'   => array( '.site-title' ),
			'title'    => __( 'Background Color', 'thetirral' ),
			'subtitle' => __( 'Choose Background Color for Page Loader.', 'thetirral' ),
			'transparent'     => false,
			'default'  => '#fff',
            ),

      )
   ));








/*
	===================================
	HEADER INFORMATION
	===================================
*/


/*---------------------------------------
Subsection --  select header logo
----------------------------------------*/
Redux::setSection( $opt_name, array(
	'title'            => __( 'Select header logo', 'thetirral' ),
	'desc'             => __( '', 'thetirral'),
	'id'               => 'header-logo',
	'subsection'       => true,
	'customizer_width' => '700px',
	'fields'           => array(
	array(
		'id'       => 'opt-logo-variant',
		'type'     => 'radio',
		'title'    => __('Select name of the site', 'thetirral'), 
		'subtitle' => __('Choose output - logo or name of the site', 'thetirral'),
		'options'  => array(
		'1' => 'Name of the site', 
		'2' => 'Site logo'
		),
		'default' => '1'
		),
		array(
			'id'       => 'opt-logo-select',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Logo', 'thetirral'),
			'subtitle' => __('Recomended size - height 300px, width 600px', 'thetirral'),
			'default'  => array(
			'url'=> get_template_directory_uri().'/img/logo.png')
        )

      )
   ));






/*---------------------------------------
Subsection --  select contact information
----------------------------------------*/
Redux::setSection( $opt_name, array(
	'title'            => __( 'Contact information', 'thetirral' ),
	'desc'             => __( '', 'thetirral'),
	'id'               => 'telefonse',
	'subsection'       => true,
	'customizer_width' => '700px',
	'fields'           => array(
	             array(
                'id'       => 'opt-checkbox-telefonse-one',
                'type'     => 'checkbox',
                'title'    => __( 'Checkbox Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'default'  => '1'// 1 = on | 0 = off
                 ),
  	            array(
                'id'       => 'opt-first-telephone-icons',
                'type'     => 'image_select',
                'title'    => __( 'Images Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'options'  => array(
                    '1' => array( 'title' => 'Opt 1', 'img' => get_template_directory_uri().'/img/placeholder.jpg' ),
                    '2' => array( 'title' => 'Opt 2', 'img' => get_template_directory_uri().'/img/smartphone.jpg' ),
                    '3' => array( 'title' => 'Opt 3', 'img' => get_template_directory_uri().'/img/plane.jpg' ),
                    '4' => array( 'title' => 'Opt 4', 'img' => get_template_directory_uri().'/img/user.jpg' )
                ),
                'default'  => '1'
                ),
	            array(
				'id'       => 'opt-first-telephone-value',
				'type'     => 'text',
				'title'    => __( 'Write the first slide header', 'thetirral' ),
				'desc'     => __( 'Put title for first slide', 'thetirral' ),
				'default'  => 'Kiev, Zakrevskogo street',
		        ),
		        array(
                'id'       => 'opt-checkbox-telefonse-two',
                'type'     => 'checkbox',
                'title'    => __( 'Checkbox Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'default'  => '1'// 1 = on | 0 = off
                 ),
	            array(
                'id'       => 'opt-second-telephone-icons',
                'type'     => 'image_select',
                'title'    => __( 'Images Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'options'  => array(
                    '1' => array( 'title' => 'Opt 1', 'img' => get_template_directory_uri().'/img/placeholder.jpg' ),
                    '2' => array( 'title' => 'Opt 2', 'img' => get_template_directory_uri().'/img/smartphone.jpg' ),
                    '3' => array( 'title' => 'Opt 3', 'img' => get_template_directory_uri().'/img/plane.jpg' ),
                    '4' => array( 'title' => 'Opt 4', 'img' => get_template_directory_uri().'/img/user.jpg' )
                ),
                'default'  => '2'
                ),
				array(
				'id'       => 'opt-second-telephone-value',
				'type'     => 'text',
				'title'    => __( 'Write the first slide header', 'thetirral' ),
				'desc'     => __( 'Put title for first slide', 'thetirral' ),
				'default'  => '+3(098)-403-02-18',
				),
			    array(
                'id'       => 'opt-checkbox-telefonse-three',
                'type'     => 'checkbox',
                'title'    => __( 'Checkbox Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'default'  => '1'// 1 = on | 0 = off
                ),
            	array(
                'id'       => 'opt-third-telephone-icons',
                'type'     => 'image_select',
                'title'    => __( 'Images Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'options'  => array(
                    '1' => array( 'title' => 'Opt 1', 'img' => get_template_directory_uri().'/img/placeholder.jpg' ),
                    '2' => array( 'title' => 'Opt 2', 'img' => get_template_directory_uri().'/img/smartphone.jpg' ),
                    '3' => array( 'title' => 'Opt 3', 'img' => get_template_directory_uri().'/img/plane.jpg' ),
                    '4' => array( 'title' => 'Opt 4', 'img' => get_template_directory_uri().'/img/user.jpg' )
                ),
                'default'  => '3'
                ),
				array(
				'id'       => 'opt-third-telephone-value',
				'type'     => 'text',
				'title'    => __( 'Write the first slide header', 'thetirral' ),
				'desc'     => __( 'Put title for first slide', 'thetirral' ),
				'default'  => 'tirral25383@gmail.com',
		),
      )
   ));




/*
	===================================
	HEADER SLIDER
	===================================
*/

Redux::setSection( $opt_name, array(
	'title'            => __( 'Header Slider', 'thetirral' ),
	'id'               => 'slider',
	'desc'             => __( 'These are really my new section!', 'thetirral' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-th-large'
) );



/*-----------------------------------------------
Subsection --  select parameters of first slide
------------------------------------------------*/
   Redux::setSection( $opt_name, array(
        'title'      => __( 'Select parameters of first slide', 'thetirral' ),
        'id'         => 'slider-first',
	    'subsection'       => true,
        'fields'     => array(
	   
	   array(
			'id'       => 'opt-first-slide-img',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Сhoose first slide image', 'thetirral'),
			'desc'     => __('Select the image of first slider.', 'thetirral'),
			'subtitle' => __('Upload any media using the WordPress native uploader', 'thetirral'),
			'default'  => array(
			'url'=> get_template_directory_uri().'/img/slide-1.jpg')
        ),
	   
	   	array(
			'id'       => 'opt-first-slide-img-description',
			'type'     => 'text',
			'title'    => __( 'Сhoose first slide image description', 'thetirral' ),
			'desc'     => __( 'Put image description for first slide', 'thetirral' ),
			'default'  => 'Image description',
		),
	   	   	array(
			'id'       => 'opt-first-slide-title',
			'type'     => 'text',
			'title'    => __( 'Write the first slide header', 'thetirral' ),
			'desc'     => __( 'Put title for first slide', 'thetirral' ),
			'default'  => 'Neme for first slide',
		),
	   	array(
			'id'       => 'opt-first-slide-description',
			'type'     => 'text',
			'title'    => __( 'Write the  first slide subtitle', 'thetirral' ),
			'desc'     => __( 'Put subtitle for first slide', 'thetirral' ),
			'default'  => 'Neme for first slide',
		),
        )
    ) );

/*-----------------------------------------------
Subsection --  select parameters of second slide
------------------------------------------------*/
Redux::setSection( $opt_name, array(
        'title'      => __( 'Select parameters of second slide', 'thetirral' ),
        'id'         => 'slider-second',
	    'subsection'       => true,
        'fields'     => array(
	   array(
			'id'       => 'opt-second-slide-img',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Сhoose second slide image', 'thetirral'),
			'desc'     => __('Select the image of second slider.', 'thetirral'),
			'subtitle' => __('Upload any media using the WordPress native uploader', 'thetirral'),
			'default'  => array(
			'url'=> get_template_directory_uri().'/img/slide-2.jpg')
        ),
	   
	   	array(
			'id'       => 'opt-second-slide-img-description',
			'type'     => 'text',
			'title'    => __( 'Сhoose second slide image description', 'thetirral' ),
			'desc'     => __( 'Put image description for second slide', 'thetirral' ),
			'default'  => 'Image description',
		),
	   	   	array(
			'id'       => 'opt-second-slide-title',
			'type'     => 'text',
			'title'    => __( 'Write the second slide header', 'thetirral' ),
			'desc'     => __( 'Put title for second slide', 'thetirral' ),
			'default'  => 'Neme for second slide',
		),
	   	array(
			'id'       => 'opt-second-slide-description',
			'type'     => 'text',
			'title'    => __( 'Write the  second slide subtitle', 'thetirral' ),
			'desc'     => __( 'Put subtitle for second slide', 'thetirral' ),
			'default'  => 'Neme for second slide',
		),

        )
    ) );

/*-----------------------------------------------
Subsection --  select parameters of third slide
------------------------------------------------*/
Redux::setSection( $opt_name, array(
        'title'      => __( 'Select parameters of third slide', 'thetirral' ),
        'id'         => 'slider-third',
	    'subsection' => true,
        'fields'     => array(
	   
	   array(
			'id'       => 'opt-third-slide-img',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Сhoose third slide image', 'thetirral'),
			'desc'     => __('Select the image of third slider.', 'thetirral'),
			'subtitle' => __('Upload any media using the WordPress native uploader', 'thetirral'),
			'default'  => array(
			'url'=> get_template_directory_uri().'/img/slide-3.jpg')
        ),
	   
	   	array(
			'id'       => 'opt-third-slide-img-description',
			'type'     => 'text',
			'title'    => __( 'Сhoose third slide image description', 'thetirral' ),
			'desc'     => __( 'Put image description for third slide', 'thetirral' ),
			'default'  => 'Image description',
		),
	   	   	array(
			'id'       => 'opt-third-slide-title',
			'type'     => 'text',
			'title'    => __( 'Write the third slide header', 'thetirral' ),
			'desc'     => __( 'Put title for third slide', 'thetirral' ),
			'default'  => 'Neme for third slide',
		),
	   	array(
			'id'       => 'opt-third-slide-description',
			'type'     => 'text',
			'title'    => __( 'Write the  third slide subtitle', 'thetirral' ),
			'desc'     => __( 'Put subtitle for third slide', 'thetirral' ),
			'default'  => 'Neme for third slide',
		),

        )
    ) );



/*
	===================================
	JAMBOTRON
	===================================
*/

Redux::setSection( $opt_name, array(
	'title'            => __( 'Header Jumbotron', 'thetirral' ),
	'id'               => 'jumbotron',
	'desc'             => __( 'These are really my new section!', 'thetirral' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-picture'
) );
   Redux::setSection( $opt_name, array(
        'title'      => __( 'Select image for jumbotron', 'thetirral' ),
        'id'         => 'jumbotron-image',
	    'subsection'       => true,
        'fields'     => array(
	     array(
			'id'       => 'opt-jumbotron-image',
			'type'     => 'media', 
			'url'      => true,
			'title'    => __('Сhoose image for jumbotron', 'thetirral'),
			'desc'     => __('Select the image for jumbotron.', 'thetirral'),
			'subtitle' => __('Upload any media using the WordPress native uploader', 'thetirral'),
			'default'  => array(
			'url'=> get_template_directory_uri().'/img/jumbotron.jpg')
        ),
        array(
			'id'            => 'opt-jumbotron-height',
			'type'          => 'slider',
			'title'         => __( 'Select jumbotron height', 'thetirral' ),
			'subtitle'      => __( 'Сhoose jumbotron height -  min. height: 0px, max. height 600px,', 'thetirral' ),
			'default'       => 300,
			'min'           => 0,
			'step'          => 5,
			'max'           => 600,
			'display_value' => 'text'
            ),
        )
    ) );








/*
	===================================
	Footer SETTINGS
	===================================
*/

Redux::setSection( $opt_name, array(
	'title'            => __( 'Footer settings', 'thetirral' ),
	'id'               => 'footer-settings',
	'desc'             => __( 'These are really my new section!', 'thetirral' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-view-mode'
) );
Redux::setSection( $opt_name, array(
	'title'            => __( 'Select footer sitebar', 'thetirral' ),
	'desc'             => __( '', 'thetirral'),
	'id'               => 'footer-sitebar',
	'subsection'       => true,
	'customizer_width' => '700px',
	'fields'           => array(
           array(
                'id'       => 'opt-footer-option',
                'type'     => 'radio',
                'title'    => __( 'Radio Option', 'thetirral' ),
                'subtitle' => __( 'No validation can be done on this field type', 'thetirral' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'thetirral' ),
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => '2'
                ),
      )
));



/*
	===================================
	CSS Style
	===================================
*/
Redux::setSection( $opt_name, array(
	'title'            => __( 'CSS Style', 'thetirral' ),
	'desc'             => __( '', 'thetirral'),
	'id'               => 'css-style',
	'customizer_width' => '700px',
	'icon'             => 'el el-css',
	'fields'           => array(
                array(
                'id'       => 'opt-ace-editor-css',
                'type'     => 'ace_editor',
                'title'    => __( 'CSS Code', 'thetirral' ),
                'subtitle' => __( 'Paste your CSS code here.', 'thetirral' ),
                'mode'     => 'css',
                'theme'    => 'chrome',
                'desc'     => 'Possible modes bla-bla-bla',
                'default'  => "#header{\n   margin: 0 auto;\n}"
                 ),
     )
));








    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'thetirral' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }


    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'thetirral' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'thetirral' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

