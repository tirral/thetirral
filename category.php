<?php
/**
 * The template for displaying archive pages
 *
 * @package thetirral
 */

get_header(); ?>

<?php thetirral_jumbotron_template(); ?>

<div id="primary" class="content-area col-md-9">
    <main id="main" class="site-main" role="main">
        <header class="page-header">
            <?php
            the_archive_title( '<h3 class="archive-title">', '</h3>' );
            the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
        </header><!-- .page-header -->	
        <?php
        if ( have_posts() ) :
        if ( is_home() && ! is_front_page() ) : ?>
        <header>
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
        <?php
        endif;
        /* Start the Loop */
        while ( have_posts() ) : the_post();
        /*
        * Include the Post-Format-specific template for the content.
        * If you want to override this in a child theme, then include a file
        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        */
            get_template_part( 'template-parts/content', get_post_format() );
        endwhile;
            the_posts_navigation();
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif; ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer();