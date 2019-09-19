Query all categories:
<ul>
	<?php 
	$terms = get_terms( array(
		'taxonomy' => 'custom_cat',
		'hide_empty' => true,
	) );
	foreach ( $terms as $term ) { ?>
		<li class="our-work-cat-link"><a href="<?php echo get_term_link($term); ?>" class="cta cta-orange-dash"><?php echo $term->name; ?></a></li>
	<?php }  ?>
</ul>

Query categories for specific post:
<?php 
$terms = get_the_terms( $post->ID , 'custom_cat' );
// Loop over each item since it's an array
if ( $terms != null ){
	foreach( $terms as $term ) {
		$term_link = get_term_link( $term, 'custom_cat' );
		 // Print the name and URL
		echo '<a href="' . $term_link . '">' . $term->name . '</a>';
		// Get rid of the other data stored in the object, since it's not needed
		unset($term); 
	} 
} ?>

If using "Categories Images" Plugin (https://wordpress.org/plugins/categories-images/), do like this:
<?php
$terms = get_the_terms( $post->ID , 'custom_cat' );
// Loop over each item since it's an array
if ( $terms != null ){
	foreach( $terms as $term ) {
		$term_link = get_term_link( $term, 'custom_cat' );
		 // Print the name and URL ?>
		<a href="<?php echo $term_link; ?>" class="tutor-subject-title"><img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" /></a>
		
		<?php 
		echo '<a href="' . $term_link . '" class="tutor-subject-title">' . $term->name . '</a>';
		// Get rid of the other data stored in the object, since it's not needed
		unset($term);
	}	
} ?>

If you're using the "Colorful Categories" Plugin (https://wordpress.org/plugins/colorful-categories/), you can add the color to the category like this:
<?php 
$terms = get_the_terms( $post->ID , 'course_cat' );
// Loop over each item since it's an array
if ( $terms != null ){
	foreach( $terms as $term ) {
		$color = ColorfulCategories::getColorForTerm($term->term_id, true);
		echo '<span class="course-cat" style="background-color: ' . $color . ';">' . $term->name . '</span>';
		// Get rid of the other data stored in the object, since it's not needed
		unset($term); 
	} 
}				
?>

Get list of child categories from a parent category (custom taxonomy)
<?php
	$term_id = 30; // ID of the parent category
	$taxonomy_name = 'event-categories'; // Name of the overall category (not the parent, the custom taxonomy for the post type)
	$term_children = get_term_children( $term_id, $taxonomy_name );

	echo '<ul>';
	foreach ( $term_children as $child ) {
		$term = get_term_by( 'id', $child, $taxonomy_name );
		echo '<li><a href="' . get_term_link( $child, $taxonomy_name ) . '">' . $term->name . '</a></li>';
	}
	echo '</ul>';
?> 

Get list of child categories for a specific post
<?php 
	$taxonomy = 'subject'; //Put your custom taxonomy term here
	$terms = wp_get_post_terms( $post->ID, $taxonomy );
	foreach ( $terms as $term )
        {
	if ($term->parent == 0) // this gets the parent of the current post taxonomy
	{$myparent = $term;}
        }
	foreach ( $terms as $term ) {
		if ($term->parent != 0) // this ignores the parent of the current post taxonomy
		{ 
		$child_term = $term; // this gets the children of the current post taxonomy
		echo ''.$child_term->name.'<span class="comma">, </span>'; // In the CSS you will want to hide the last comma span
		}
    }	 ?>
