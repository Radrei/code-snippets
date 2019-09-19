<?php $query = new WP_Query( array( 'post_type' => 'property_listing' ) );                  

	if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>   
			<div class="archive-property-holder">
				<div class="archive-property-holder-image">
					<img src="<?php echo the_field('main_image'); ?>" />
				</div>						
				<div class="archive-property-holder-details">
					<h3><?php echo the_field('title'); ?></h3>
					<?php echo the_field('subtitle'); ?>
				</div>
			</div>
		<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
	<?php else : ?>
		<!-- show 404 error here -->
<?php endif; ?>
