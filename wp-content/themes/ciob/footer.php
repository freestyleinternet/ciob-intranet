		<footer>
        	<div class="wrapper">
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
              <div class="col editor">
              	<?php the_field('footer_editor'); ?>
              </div>
           </div> 
		</footer>

  <?php wp_footer(); ?>
  <?php	
        $rows = get_field('image_options',5); // get all the rows
        $rand_row = $rows[ array_rand( $rows ) ]; // get a random row
        $rand_row_image = $rand_row['upload_an_image']; // get the sub field value 
    ?>
    <style type="text/css">
	<!--
	section#main {
		min-height:707px;
		padding-top:24px;
		background-color:#fff;
		background-position:bottom center;
		background-repeat:no-repeat;	
		background-image: url(<?php  echo $rand_row_image; ?>);
	}
	-->
	</style>

</body>
</html>
