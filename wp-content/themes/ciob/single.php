<?php get_header(); ?>

    <section id="main" role="main">
    	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
    	<div class="wrapper">   
    		<aside>
            	<h2>Category Archives</h2>
                <ul>
                  <?php wp_list_categories('orderby=name&title_li='); ?>
                </ul>
			</aside>
            
           <section class="main-content" role="main">
           		<h1><?php the_title(); ?></h1>
            	<?php the_content(); ?>
                <?php if(in_array('Show', get_field('check_box_to_show_the_page_admin') )): ?>
                   <div class="author-container">
                        <div class="author">
                            
                            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 70 ); ?>
                            <div class="v-align">
                            <?php
                            $fname = get_the_author_meta('first_name');
                            $lname = get_the_author_meta('last_name');
                            $full_name = '';
                            
                            if( empty($fname)){
                                $full_name = $lname;
                            } elseif( empty( $lname )){
                                $full_name = $fname;
                            } else {
                                $full_name = "{$fname} {$lname}";
                            }
                            ?>
                          <h1>Author: <?php echo $full_name; ?></h1>
                          <p>Date: <?php the_date('j/m/Y'); ?></p> 
                          </div> 
                        </div>   
                  </div>
                <?php endif; ?>
           </section> 
    	</div>
    	<?php endwhile; ?>
    	</div> <!-- /.container -->
    </section> <!-- /#main -->

<?php get_footer(); ?>
