<?php

/*
	
@package thetirral
-- Single Post Template

*/

?>



<!--<p class="hint-level-two"> НАЧАЛО вывода ПОЛНОГО контента СТАНДАРТНОГО ПОСТА, находится в файле == template-parts/single.php</p>-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
		?>
			
			<a class="standard-featured-link" href="<?php the_permalink(); ?>">
				<div class="standard-featured background-image" style="background-image: url(<?php echo $featured_image; ?>);"></div>
			</a>
			
		<?php endif; ?>	
	
	
	
	
	<header class="entry-header text-center">
		
		<?php the_title( '<h1 class="entry-title">', '</h1>'); ?>
		
		<div class="entry-meta">
			<?php echo thetirral_posted_meta(); ?>
		</div>
		
	</header>
	

	
	
	
	<div class="entry-content clearfix">
		
		<?php the_content(); ?>
		
	</div><!-- .entry-content -->
	
<?php
wp_link_pages( array(
'before' => '<div class="page-links">' . __( 'Pages:', 'thetirral' ),
'after'  => '</div>',
) );
?>

	<footer class="entry-footer">
		<?php echo thetirral_posted_footer(); ?>
	</footer>
	
</article>

<!--<p class="hint-level-two"> КОНЕЦ вывода ПОЛНОГО контента СТАНДАРТНОГО ПОСТА, находится в файле == template-parts/single.php</p>-->