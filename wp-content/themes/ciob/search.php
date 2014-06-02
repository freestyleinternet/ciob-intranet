<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage CIOB
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="main" role="main">
    
    	<div class="wrapper">
        
        	<div class="main-content">

				<?php if ( have_posts() ) : ?>
        
                    <h1><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
        
                    <?php while ( have_posts() ) : the_post(); ?>
        
                        <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
        
                            <?php get_template_part( 'templates/partials/inc', 'meta' ); ?>
        
                            <div class="entry">
        
                                <?php the_excerpt(); ?>
        
                            </div>
        </a>
                        </article>
        
                    <?php endwhile; ?>
        
        
                <?php else : ?>
        
                    <h1>No posts found.</h1>
        
                <?php endif; ?>
            
            </div>
        
        </div>

	</section> <!-- /#main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
