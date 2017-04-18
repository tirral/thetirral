<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thetirral
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
     <header class="entry-header text-center">
         <?php the_title( '<h1 class="entry-title"><a href="'. esc_url( get_permalink() ) .'" rel="bookmark">', '</a></h1>'); ?>
	            <div class="entry-meta">
                <?php echo thetirral_posted_meta(); ?> <!-- функция находится в файле inc/theme-suport.php -->
            </div>
     </header>
        <div class="entry-content">
        <div class="entry-thumb">
      		<?php if( has_post_thumbnail() ): 
			$featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('thetirral-large-thumb'); ?></a>
	    </div>		
 			<?php endif; ?>
                <div class="entry-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <div class="button-container text-center">
                    <a href="<?php the_permalink(); ?>" class="btn btn-thetirral">
                        <?php _e( 'Read More', 'thetirral' ); ?>  
                    </a>
                </div>
                          <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'thetirral' ),
				'after'  => '</div>',
			) );
		?>
    </div>
    <!-- .entry-content -->
    <footer class="entry-footer">
        <?php echo thetirral_posted_footer(); ?> <!-- функция находится в файле inc/theme-suport.php -->
    </footer>
      
</article>