For a single blog post or post in an archive:
<?php 
if ( has_post_thumbnail() ) {
	the_post_thumbnail('medium');
}
else {
	echo '<img src="' . get_template_directory_uri() . '/library/images/post-default.jpeg" />';
}
?>
Or if you want the URL of it to use in an IMG tag in a single blog post or post in an archive:
<?php
if ( has_post_thumbnail() ) {
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' )[0];
}
else {
	$img = get_template_directory_uri() . '/library/images/post-default.jpg';
}?>
<div class="archive-article--image-container" style="background-image: url(<?php echo $img; ?>);">
	<img src="<?php echo $img; ?>" alt="<?php echo the_title(); ?>" class="archive-article--image" />
</div>

For a hero on a page template:
<!--Get Post Featured Image-->
<?php global $post; ?>
<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
<div class="hero about-hero" style="background-image: url(<?php echo $src[0]; ?> );">
		<h1><?php echo the_title(); ?></h1>
</div>	

For the hero on the blog page:
<?php
	$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
?>
<div class="hero blog-hero" style="background-image: url(<?php echo $img[0]; ?> );">

For the hero on the Shop (Woocommerce) page:
<?php
	$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('woocommerce_shop_page_id')),'full'); 
?>
<div class="hero shop-hero" style="background-image: url(<?php echo $img[0]; ?> );">
