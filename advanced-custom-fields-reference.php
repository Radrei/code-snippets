<!--
CONTENTS:
* Basic loop for repeater or flexible content
* Basic loop within a loop
* Basic Slick Slider loop
* Image Array
* Gallery
-->

<!--Basic loop for repeater or flexible content-->
<?php if( have_rows('main_field_name') ): ?>	
	<?php while( have_rows('main_field_name') ): the_row();

		// display a sub field value
		$title = get_sub_field('title');
		$paragraph = get_sub_field('paragraph');
	?>						
	<div class="content">	
		<h2><?php echo $title; ?></h2>
		<?php echo $paragraph; ?>
	</div>					
	<?php endwhile; ?>
<?php endif; ?>

<!--Basic loop within a loop-->
<?php if( have_rows('first_loop') ): ?>	
	<?php while( have_rows('first_loop') ): the_row();
		// display a sub field value
		$title = get_sub_field('title', false, false);
		$paragraph = get_sub_field('paragraph');
	?>
	<div class="wrapper">
		<h1><?php echo $title; ?></h1>
		<?php echo $paragraph; ?>		
		
		<?php if( have_rows('second_loop') ): ?>
			<ul>
			<?php while( have_rows('second_loop') ): the_row();

				// display a sub field value
				$benefit = get_sub_field('benefit');
			?>
				
				<li><?php echo $benefit; ?></li>
				
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
	<?php endwhile; ?>
<?php endif; ?>

<!--Basic Slick Slider loop-->
<div class="slick-slider">
	<?php if( have_rows('trusted_by') ): ?>	
		
		<?php while( have_rows('trusted_by') ): the_row();

			// display a sub field value
			$logo = get_sub_field('logo');
		?>
			
		<div class="slide partner-slide">
			<img src="<?php echo $logo; ?>" />
		</div>
	
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<!--Image (array). Put inside repeater loop if applicable-->
<?php 

$image = get_field('image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>

<!--Gallery-->
<?php 

$images = get_field('gallery');

if( $images ): ?>
    <ul>
        <?php foreach( $images as $image ): ?>
            <li class="gallery-image" style="background-image: url(<?php echo $image['url']; ?>);">
                <a href="<?php echo $image['url']; ?>" rel="lightbox" class="gallery-overlay">
					<div>
						<i class="fa fa-search"></i>
					</div>
				</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<!--Css for gallery overlay-->
.gallery-overlay{
	display: none;
}
.gallery-image{
	background-position: center;
	background-size: cover;
	cursor: pointer;
	float: left;
	height: 250px;
	position: relative;
	width: 50%;
}
.gallery-image:hover .gallery-overlay{
	background-color: rgba(8, 98, 134, 0.7);
	width: 100%;
    height: 100%;
	position: absolute;
	display: block;
	top: 0;
	
	div{
		display: table;
		width: 100%;
		height: 100%;
	}
	.fa-search{
		font-size: 2em;
		color: white;
		display: table-cell;
		vertical-align: middle;
		text-align: center;
	}
}
