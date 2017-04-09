<?php
/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @package thetirral
*/


?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php include('inc/reduxstyle.php'); ?>
</head>

    
<?php global $tirral_global;?>    
<div id="page-preloader"><img src="<?php  echo  $tirral_global['opt-preloader-select']['url']; ?>" alt="Wait when page loaded" /></div>
<body <?php body_class(); ?>>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'thetirral' ); ?></a>

<div class="header-wrap" ></div>

<header id="masthead" class="site-header" role="banner">

<div class="container-fluid">

<div class="row">

<!--logo container-->
<div class="col-md-3 col-sm-12">
    
<div class="site-branding">
 <?php global $tirral_global;?>     
<?php if($tirral_global['opt-logo-variant'] == 1) : ?>
<?php if ( is_front_page() && is_home() ) : ?>
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : ?>
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php endif;
$description = get_bloginfo( 'description', 'display' );
if ( $description || is_customize_preview() ) : ?>
<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
<?php endif; ?>
<?php endif;?>
 <?php global $tirral_global;?>     
<?php if($tirral_global['opt-logo-variant'] == 2) : ?>
<img class="site-logo" src="<?php  echo  $tirral_global['opt-logo-select']['url']; ?>" alt="Site Logo">
<?php endif;?>		
</div><!-- .site-branding -->
    
</div>

<div class="col-md-9 col-sm-12">


<div class="row">
<div class="col-md-12 col-sm-12">
<div class="telephone-wrapper">
<ul>

<li>
<!--FOR WOOCOMMERCE HEADER ICON-->
<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    $count = WC()->cart->cart_contents_count;
    ?><span class="cart-conteiner"><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'thetirral' ); ?>"><?php 
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php
    }
        ?></a></span>
 
<?php } ?>
<!--FOR WOOCOMMERCE HEADER ICON-->

</li>


<li>

<?php global $tirral_global;?> 
<?php if($tirral_global['opt-checkbox-telefonse-three'] == 1) : ?>

<?php if($tirral_global['opt-third-telephone-icons'] == 1) : ?>
<span class="icon flaticon-placeholder"></span>
<?php endif;?>

<?php if($tirral_global['opt-third-telephone-icons'] == 2) : ?>
<span class="icon flaticon-smartphone-6"></span>
<?php endif;?>

<?php if($tirral_global['opt-third-telephone-icons'] == 3) : ?>
<span class="icon flaticon-paper-plane-1"></span>
<?php endif;?>	

<?php if($tirral_global['opt-third-telephone-icons'] == 4) : ?>
<span class="icon flaticon-user-3"></span>
<?php endif;?>			

<span><?php echo $tirral_global['opt-third-telephone-value'] ?></span>

<?php endif;?>			

</li>


<li>
<?php global $tirral_global;?>
<?php if($tirral_global['opt-checkbox-telefonse-two'] == 1) : ?>

<?php if($tirral_global['opt-second-telephone-icons'] == 1) : ?>
<span class="icon flaticon-placeholder"></span>
<?php endif;?>

<?php if($tirral_global['opt-second-telephone-icons'] == 2) : ?>
<span class="icon flaticon-smartphone-6"></span>
<?php endif;?>

<?php if($tirral_global['opt-second-telephone-icons'] == 3) : ?>
<span class="icon flaticon-paper-plane-1"></span>
<?php endif;?>	

<?php if($tirral_global['opt-second-telephone-icons'] == 4) : ?>
<span class="icon flaticon-user-3"></span>
<?php endif;?>			

<span><?php echo $tirral_global['opt-second-telephone-value'] ?></span>

<?php endif;?>	

</li>


<li>
<?php global $tirral_global;?>

<?php if($tirral_global['opt-checkbox-telefonse-one'] == 1) : ?>

<?php if($tirral_global['opt-first-telephone-icons'] == 1) : ?>
<span class="icon flaticon-placeholder"></span>
<?php endif;?>

<?php if($tirral_global['opt-first-telephone-icons'] == 2) : ?>
<span class="icon flaticon-smartphone-6"></span>
<?php endif;?>

<?php if($tirral_global['opt-first-telephone-icons'] == 3) : ?>
<span class="icon flaticon-paper-plane-1"></span>
<?php endif;?>	

<?php if($tirral_global['opt-first-telephone-icons'] == 4) : ?>
<span class="icon flaticon-user-3"></span>
<?php endif;?>			

<span><?php echo $tirral_global['opt-first-telephone-value'] ?></span>

<?php endif;?>			

</li>
    
</ul>

</div>
</div>	
</div>

</div>
</div>



<div  class="container-fluid">
<div id="mainnavwrapper" class="row">
    <!--menu container-->
    <div class="col-md-12 col-sm-12">
        <div class="btn-menu"></div>
        <nav id="mainnav" class="mainnav" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
        </nav>
        <!-- #site-navigation -->
    </div>
</div>
</div>
</div>



</header><!-- #masthead -->

<div id="content" class="site-content">
<div class="container-fluid content-wrapper">
<div class="row">

