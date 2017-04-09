<?php
/*
Template Name: Front Page
*/

get_header(); ?>



<?php thetirral_slider_template(); ?>


<p>----- НАЧАЛО страницы -- page_front-page.php (Front Page)-----</p>



	<div id="primary" class="content-area col-md-9">
		<main id="main" class="site-main" role="main">

			<div class="entry-content">
				<?php while ( have_posts() ) : the_post(); 
				
					get_template_part( 'template-parts/content', 'page' );
					
				endwhile; ?>
			</div><!-- .entry-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php


get_sidebar(); ?>
		
<!--<p>----- КОНЕЦ страницы -- page_front-page.php -----</p>		-->
		
<?php get_footer(); ?>
