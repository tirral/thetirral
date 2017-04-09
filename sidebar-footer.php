<?php
/**
 *
 * @package thetirral
 *
 */
?>

<?php //Set widget areas classes based on user choice

global $tirral_global;	

if($tirral_global['opt-footer-option'] == 1) : 
	$cols = 'col-md-12';
endif;
if($tirral_global['opt-footer-option'] == 2) : 
	$cols = 'col-md-6';
endif;	
if($tirral_global['opt-footer-option'] == 3) : 
	$cols = 'col-md-4';
endif;	
?>

<div id="sidebar-footer" class="footer-widgets widget-area" role="complementary">
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="sidebar-column <?php echo $cols; ?>">
			<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
			<?php endif; ?>	
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="sidebar-column <?php echo $cols; ?>">
			<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
			<?php endif; ?>	
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="sidebar-column <?php echo $cols; ?>">
			<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
			<?php endif; ?>	
		</div>
	</div>	
</div>