<?php 
/*
Template Name: Maps
*/
get_header(); ?>

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
           	<h1><?php the_title(); ?></h1>
            	<?php the_content(); ?>
                
                <?php
                $location = get_field('map_addition');
                if( ! empty($location) ){
                ?>
                <h2><?php the_field('first_map_title'); ?></h2>
                <div id="map" style="width: 100%; height: 350px;"></div>
                <script type="text/javascript">
                  //<![CDATA[
                    function load() {
                    var lat = <?php echo $location['lat']; ?>;
                    var lng = <?php echo $location['lng']; ?>;
                // coordinates to latLng
                    var latlng = new google.maps.LatLng(lat, lng);
                // map Options
                    var myOptions = {
                    zoom: 15,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                   };
                //draw a map
                    var map = new google.maps.Map(document.getElementById("map"), myOptions);
                    var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map
                   });
                }
                // call the function
                   load();
                //]]>
                </script>
                <?php
                }
                	else { echo "map not found"; }
                ?>
                
                <?php
                $location = get_field('map_two');
                if( ! empty($location) ){
                ?>
                <h2><?php the_field('second_map_title'); ?></h2>
                <div id="maptwo" style="width: 100%; height: 350px;"></div>
                <script type="text/javascript">
                  //<![CDATA[
                    function load() {
                    var lat = <?php echo $location['lat']; ?>;
                    var lng = <?php echo $location['lng']; ?>;
                // coordinates to latLng
                    var latlng = new google.maps.LatLng(lat, lng);
                // map Options
                    var myOptions = {
                    zoom: 15,
                    center: latlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                   };
                //draw a map
                    var map = new google.maps.Map(document.getElementById("maptwo"), myOptions);
                    var marker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map
                   });
                }
                // call the function
                   load();
                //]]>
                </script>
                <?php
                }
                	else { echo "map not found"; }
                ?>
                
              <?php if( have_rows('add_download') ): ?>
              <ul class="downloads">
              		<?php while(the_repeater_field('add_download')): ?>
                		<li><a href="<?php the_sub_field('file_to_download'); ?>" target="_blank"><?php the_sub_field('file_name'); ?><br><?php the_sub_field('file_size'); ?></a></li>
                  <?php  endwhile;  ?>
              </ul>
              <?php endif; ?>
				
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
    	<?php endwhile; endif; ?>
    	</div> <!-- /.container -->
    </section> <!-- /#main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
