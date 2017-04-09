<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package thetirral
 */
?>

</div><!-- .row start in header.php -->
	</div><!-- .container -->
	</div><!-- #content -->
	
<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>		
	
<a class="go-top"><i class="fa fa-angle-up"></i></a>

<hr class="footer-shadow">

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', '<span class="footer-info">thetirral</span>' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'thetirral' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', ' <span class="footer-info">thetirral</span>' ), '<span class="footer-info">thetirral</span>', '<a href="https://automattic.com/" rel="designer">Ruslan Prudnia</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>



