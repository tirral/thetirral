<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thetirral
 */



if ( ! is_active_sidebar( 'shop' ) ) {
	return;
}
?>



<div id="secondary" class="widget-area mCustomScrollbar col-md-3" role="complementary" data-mcs-theme="minimal-dark">
	<?php dynamic_sidebar( 'shop' ); ?>
</div><!-- #secondary -->

