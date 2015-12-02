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

					<div class="definition six columns text-center">
						<?php the_field('definition'); ?>
					</div>

					<div class="mission six columns text-center">
						<?php the_field('mission'); ?>
					</div>

				<?php endwhile; // end of the loop. ?>

					<?php
					//Begin Image and Text Section
					// check if the repeater field has rows of data
					if( have_rows('image_text_section') ):
					
					 	// loop through the rows of data
					    while ( have_rows('image_text_section') ) : the_row();
					
					        // display a sub field value
					  		?>
					  			<div class="twelve columns section">
						  			<div class="three columns sectionImg">
						  				<?php $imgtxt = get_sub_field('section_image');
						  					$img = wp_get_attachment_image_src( $imgtxt, 'thumbnail' );
						  					echo '<img src="'.$img[0] . '" class="hex-image" />'; ?>
						  					<svg xml:space="preserve" viewBox="0 0 240 240">
  												<path id="svgMask" d="M 0 -0.96484375 L 0 241.875 L 240.96484 241.875 L 240.96484 -0.96484375 L 0 -0.96484375 z M 119.75 9.3632812 C 122.3 9.3632812 124.85039 10.0125 127.15039 11.3125 L 210.15039 59.412109 C 214.75039 62.012109 217.55078 66.912891 217.55078 72.212891 L 217.75 168.11328 C 217.75 173.41328 214.94961 178.31211 210.34961 180.91211 L 127.65039 228.61328 C 123.05039 231.31328 117.35 231.31328 112.75 228.61328 L 29.75 180.51172 C 25.15 177.91172 22.349609 173.01289 22.349609 167.71289 L 22.25 71.8125 C 22.25 66.5125 25.050391 61.611719 29.650391 59.011719 L 112.34961 11.3125 C 114.64961 10.0125 117.2 9.3632812 119.75 9.3632812 z "  />
  											</svg>
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
					
			</div>



		</div><!-- /#main -->

	</div><!-- End Content row -->

<?php get_footer(); ?>