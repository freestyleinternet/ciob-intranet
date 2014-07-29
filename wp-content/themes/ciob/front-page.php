<?php get_header(); ?>

	<section id="main" role="main">
		<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="wrapper"> 
              <div class="col-one">
              	<h2>LATEST</h2>
              	<!--<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/video-default.jpg" width="467" height="264" alt=""/>-->
            	<?php the_content(); ?>
            </div>
              
              <div class="col-two">
              		<?php the_field('box_one_content', false, false); ?>
              		<?php if( get_field('box_one_link_to_file') ): ?>
              			<a href="<?php the_field('box_one_link_to_file'); ?>" target="_blank"><?php the_field('box_one_link_to_file_text_for_link'); ?></a>
              		<?php endif; ?>
              		<?php if( get_field('box_one_link_to_page') ): ?>
              			<a href="<?php the_field('box_one_link_to_page'); ?>"><?php the_field('box_one_link_to_page_link_text'); ?></a>
              		<?php endif; ?>
              </div>
              <div class="col-two">
              		<?php the_field('box_three_content', false, false); ?>
              		<?php if( get_field('box_three_link_to_file') ): ?>
              			<a href="<?php the_field('box_three_link_to_file'); ?>" target="_blank"><?php the_field('box_three_link_to_file_text_for_link'); ?></a>
              		<?php endif; ?>
              		<?php if( get_field('box_three_link_to_page') ): ?>
              			<a href="<?php the_field('box_three_link_to_page'); ?>"><?php the_field('box_three_link_to_page_link_text'); ?></a>
              		<?php endif; ?>	
              </div>
             
             
            <div class="cycle-slideshow" 
                data-cycle-fx=scrollHorz
                data-cycle-swipe=true
                data-cycle-slides="div.slide"
                data-cycle-prev="#prev"
                data-cycle-next="#next">
                <div class="cycle-pager"></div>
				<?php
                $my_query = new WP_Query( "post_type=post" );
                if ( $my_query->have_posts() ) { 
                    while ( $my_query->have_posts() ) { 
                        $my_query->the_post();
                ?>
                  <div class="slide">
                      <h1><?php the_title(); ?></h1>
                      <p><?php echo truncate($post->post_content, 80); ?></p>
                      <a class="yellowimg arrow thinner" href="<?php bloginfo('url'); ?>/news/">Read More...</a>
                  </div>
                  <?php
                     }
                 }
                 wp_reset_postdata();
                 ?>
            	</div>
                
				<div class="full-width">    
                  <div class="col-one leftalign noborder">
                  	<h1><?php the_field('the_logo_box_title'); ?></h1>
                  	<?php if( have_rows('logos') ): ?>
                  		<?php while(the_repeater_field('logos')): ?>
                              <div class="logo-block">
                              	<div class="element"><img src="<?php the_sub_field('client_logo'); ?>" alt="<?php the_sub_field('client_name'); ?>"/></div>
                              </div>
                  		<?php  endwhile;  ?>
                  	<?php endif; ?>
                  </div> 
                  <div class="col-three noborder">
                  	<?php the_field('service_desk_block'); ?>
                  </div>
  				</div>             
              <div class="social-feeds">
                <div class="col4 twitterfeed first">
                <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/twitter-icon.png" width="19" height="16" alt=""/>TWITTER</h4>
                <?php
					require_once('Creare_Twitter.php');
					
					$twitter = new Creare_Twitter();
					$twitter->screen_name = "theCIOB";
					$twitter->not = 4;
					$twitter->consumerkey = "vzqphySg7bmzihUk3QjFA";
					$twitter->consumersecret = "RJiXv0bS0FvNso6liKPKL1ycEQlc2RzEuVVeaO1wCv8";
					$twitter->accesstoken = "66349240-qam8D4HFGVhRAWRsyyjFlMpSKQwHQzVZ9e9inMjXy";
					$twitter->accesstokensecret = "irVJVlqqe6uFaWG1R3ku27rCQ973NwtpWu3levZbrmMo8";
					
					# cache file
					$twitter->cachefile = $_SERVER['DOCUMENT_ROOT']."/twitter/twitter.txt";
					$twitter->tags = true;
					
					/* You can optionally change the following public properties
					$twitter->tags = true; // show all html tags? FALSE = remove all tags
					$twitter->nofollow = true; // all links to be no-follow?
					$twitter->newwindow = true; // all links to open in new window?
					$twitter->hashtags = true; // link up hashtags to twitter search?
					$twitter->attags = true; // link up @ tags to profile pages
					*/
					
					$tweets = $twitter->getLatestTweets();
					
					foreach($tweets as $tweet){
					?>
                  <p><?php echo $tweet['tweet']; ?></p>
              		<?php } ?>
                </div>
                <div class="col2">
                  <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/facebook-icon.png" width="19" height="16" alt="facebook"/>FACEBOOK</h4>
                  <div id="fb-root"></div>
					<script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=306982196115534&version=v2.0";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                  <div class="fb-post" data-href="https://www.facebook.com/FacebookDevelopers/posts/10151471074398553" data-width="464"></div>
                </div>
                <div class="col4 last">
                  <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/youtube.png" width="17" height="17" alt=""/>YOUTUBE</h4>
                  <?php dynamic_sidebar( 'footer-youtube' ); ?>
                	<!--<h4 class="second"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/flickr-icon.png" width="27" height="27" alt=""/>FLICKR</h4>
                	<div id="latest-flickr-images"></div>-->
                </div>	
              </div>  
            <?php endwhile; endif; ?>
      </div>
		
		
		</div>
	</section> <!-- /#main -->


<?php get_footer(); ?>
