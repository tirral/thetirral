<?php
/**
 * The sidebar containing the main widget area
 *
 * @package thetirral
 */


if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area mCustomScrollbar col-md-3" role="complementary" data-mcs-theme="minimal-dark">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->