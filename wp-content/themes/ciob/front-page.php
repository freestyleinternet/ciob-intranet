<?php get_header(); ?>

	<section id="main" role="main">
		<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <div class="wrapper"> 
              <div class="col-one">
              		<h2>LATEST</h2>
              		<img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/video-default.jpg" width="467" height="264" alt=""/>
              		<figcaption>VIDEO TITLE  – Lorem ipsum dolor sit amet, consectetur adipisicing elit.</figcaption>
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
                    <div class="slide">
                    		<h1>EMPLOYEES COMMUNICATION</h1>
                         <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                         <a class="yellowimg arrow thinner" href="#">Read More...</a>
                    </div>
                    <div class="slide">
                    		<h1>EMPLOYEES COMMUNICATION</h1>
                         <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                         <a class="yellowimg arrow thinner" href="#">Read More...</a>
                    </div>
                    <div class="slide">
                    		<h1>EMPLOYEES COMMUNICATION</h1>
                         <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                         <a class="yellowimg arrow thinner" href="#">Read More...</a>
                    </div>
            	</div>
                
            <div class="col-one leftalign noborder">
              		<h1>CONNECT TO</h1>
              		<div class="logo-block">
                    
                  </div>
                  <div class="logo-block">
                    
                  </div>
              </div> 
              
            <div class="col-three noborder">
              		<h1>SERVICE DESK</h1>
              		<p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              		<a href="#">CALL TO ACTION HERE</a>
            </div>
              
              <div class="social-feeds">
                <div class="col4 first">
                <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/twitter-icon.png" width="19" height="16" alt=""/>TWITTER</h4>
                <?php
					require_once('Creare_Twitter.php');
					
					$twitter = new Creare_Twitter();
					$twitter->screen_name = "tweetingfrog";
					$twitter->not = 1;
					$twitter->consumerkey = "5wt7K6oTOd3ONUQ5yM0w";
					$twitter->consumersecret = "COsTEDyEGp6iQ1oRdHmxoQ0STvJyMHB8YttBAFZso2s";
					$twitter->accesstoken = "61147230-D4uaSYuUGdXH2Gg3OruqAxrIbh6TX4VsRHDxvSOf5";
					$twitter->accesstokensecret = "ijx5oGwqxRqNjnPL23A3rebepyIDWwMKzMeWKKv2DTI0h";
					
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
                <div class="col4">
                  <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/facebook-icon.png" width="19" height="16" alt="facebook"/>FACEBOOK</h4>
                  <p>Are you interested in becoming a CIOB Ambassador? Find out more about the programme here - <a href="#">http://ow.ly/vq5Wt</a></p>
                </div>
                <div class="col4">
                  <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/flickr-icon.png" width="27" height="27" alt=""/>FLICKR</h4>
                  <p>CIOB @theCIOB Apr 13 Find out how construction in the Ukraine is coping in our @globalconreview magazine <a href="#">http://ow.ly/vq5Wt</a>  #ukraine #construction</p>
                </div>
                <div class="col4 last">
                  <h4><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/icons/youtube.png" width="17" height="17" alt=""/>YOUTUBE</h4>
                  <p>CIOB @theCIOB Apr 13 Find out how construction in the Ukraine is coping in our @globalconreview magazine <a href="#">http://ow.ly/vq5Wt</a>  #ukraine #construction</p>
                </div>	
              </div>  
            
      </div>
		
		<?php endwhile; endif; ?>
		</div>
	</section> <!-- /#main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
