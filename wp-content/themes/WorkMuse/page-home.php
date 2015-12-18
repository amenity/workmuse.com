<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.3.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<?php $img = get_field('banner_image'); ?>
	<div class="hero">
		<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
		<div class ="row">
			<div class="heroOverlay five columns">
				<?php the_field('banner_overlay'); ?>
			</div>
		</div>
	</div>


	<div id="content" class="row">

		<div id="main" class="twelve columns" role="main">
			<div class="post-box">

				<?php while ( have_posts() ) : the_post(); ?>

				<?php endwhile; // end of the loop. ?>
					<div class="definition twelve columns text-center">
						<?php the_field('opening_definition'); ?>
					</div>

					<?php
					//Begin Image and Text Section
					// check if the repeater field has rows of data
					if( have_rows('image_text_section') ):
					
					 	// loop through the rows of data
					    while ( have_rows('image_text_section') ) : the_row();
					
					        // display a sub field value
					  		?>
					  			<div class="twelve columns sectionPre text-center">
						  			<?php the_sub_field('full_width'); ?>
						  		</div>

						  		<div class="twelve columns section">
						  			<div class="three columns sectionImg">
						  				<?php $imgtxt = get_sub_field('section_image');
						  					$img = wp_get_attachment_image_src( $imgtxt, 'thumbnail' );
						  					echo '<img src="'.$img[0] . '" class="hex-image" />'; ?>
						  			</div>

										<div class="three columns sectionStatistic text-center">
						  				<?php the_sub_field('section_statistic'); ?>
						  			</div>

						  			<div class="six columns sectionText dottedBorder leftDots">
						  				<?php the_sub_field('section_text'); ?>
						  			</div>
						  		</div>
								<?php 
					    endwhile;
					
					else :
					
					
					endif;
					//End Image and Text Section
					?>
					
					<div class="definition twelve columns text-center">
						<?php the_field('closing_definition'); ?>
					</div>
			</div>



		</div><!-- /#main -->

	</div><!-- End Content row -->

<?php get_footer(); ?>