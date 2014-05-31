<?php get_header(); ?>

	<section id="main" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       <div class="wrapper"> 
      <div class="col-one">
		<h2>LATEST</h2>
        <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/video-default.jpg" width="467" height="264" alt=""/>
       </div>
        
        <div class="col-two">
        	<h2>LATEST REPORT</h2>	
        </div>
        
        <div class="col-two">
        	<h2>POPULAR CONTENT</h2>	
        </div>
        </div>
		
		<?php endwhile; endif; ?>

	</section> <!-- /#main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
