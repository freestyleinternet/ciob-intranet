<?php get_header(); ?>

    <section id="main" role="main">
    	<div class="container">
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    	<div class="wrapper">   
    		<aside>
			 <?php
                if ($post->post_parent) {
                    $ancestors=get_post_ancestors($post->ID);
                    $root=count($ancestors)-1;
                    $parent = $ancestors[$root];
                } else {
                    $parent = $post->ID;
                }
                ?>
                <?php $args = array(
                    'depth'        => 0,
                    'date_format'  => get_option('date_format'),
                    'child_of'     => $parent,
                    'title_li'     => __(''),
                    'sort_column'  => 'menu_order, post_title'
                ); 
				 ?>
                <ul>
                  <?php wp_list_pages( $args ); ?> 
                </ul>
			</aside>
           <section class="main-content" role="main">
           	<h1>Employee Handbook</h1>
            	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
              <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
              <ul class="downloads">
                <li><a href="#">Title to download PDF<br>(100kb)</a></li>
                <li><a href="#">Title to download PDF<br>(100kb)</a></li>
                <li><a href="#">Title to download PDF<br>(100kb)</a></li>
                <li><a href="#">Title to download PDF<br>(100kb)</a></li>
              </ul>
           </section> 
    	</div>
    	<?php endwhile; endif; ?>
    	</div> <!-- /.container -->
    </section> <!-- /#main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
