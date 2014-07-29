<?php get_header(); ?>

    <section id="main" role="main">
    	<div class="container">

    	<div class="wrapper">   
    		<aside>
            	<h2>Category Archives</h2>
                <ul>
                  <?php wp_list_categories('orderby=name&title_li='); ?>
                </ul>
			</aside>
           <section class="main-content" role="main">
           	<h1><?php the_title(); ?></h1>
            
   
						<?php 
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            
                            $args = array( 'post_type' => 'post', 'posts_per_page' => -1);
                            $wp_query = new WP_Query($args);
                            
                            while ( have_posts() ) : the_post(); 
                        ?>
                        <article>
                        	<a href="<?php the_permalink(); ?>">
								<?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('news');
                                    }
                                ?>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo truncate($post->post_content, 350); ?> <span>Read more...</span></p>
                            </a>
                        </article>
                         <?php endwhile; ?>
                         <div class="navigation">
                         	<div class="alignleft"><?php previous_posts_link('&laquo; Previous News') ?></div>
                        	<div class="alignright"><?php next_posts_link('Latest News &raquo;','') ?></div>
						</div>
                   
            	
		    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
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
 	<?php endwhile; endif; ?>
           </section> 
    	</div>
   
    	</div> <!-- /.container -->
    </section> <!-- /#main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
