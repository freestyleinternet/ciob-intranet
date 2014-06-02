		<footer>
        	<div class="wrapper">
            	<div class="col">
                	<p>&copy; CIOB <?php echo date( "Y" ); ?></p>
              </div>
              <div class="col">
                <?php if( have_rows('footer_link_box_1',5) ): ?>
                  <ul>
                        <?php while(the_repeater_field('footer_link_box_1',5)): ?>
                            <li><a href="<?php the_sub_field('link_to_full_url',5); ?>" target="_blank"><?php the_sub_field('add_a_tilte_for_link',5); ?></a></li>
                      <?php  endwhile;  ?>
                  </ul>
					<?php endif; ?>
              </div>
              <div class="col">
                <?php if( have_rows('footer_link_box_2',5) ): ?>
                  <ul>
                        <?php while(the_repeater_field('footer_link_box_2',5)): ?>
                            <li><a href="<?php the_sub_field('add_the_full_url_here',5); ?>" target="_blank"><?php the_sub_field('add_text_for_the_link',5); ?></a></li>
                      <?php  endwhile;  ?>
                  </ul>
					<?php endif; ?>
              </div>
           </div> 
		</footer>


  <?php wp_footer(); ?>

</body>
</html>
