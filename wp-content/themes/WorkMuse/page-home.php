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
	<div class="homeHero">
		<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" />
		<div class="heroOverlay">
			<?php the_field('banner_overlay'); ?>
		</div>
	</div>

	

	<div id="content" class="row">

		<div id="main" class="twelve columns" role="main">
			<div class="post-box">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="pitch text-center">
							<?php the_field('pitch'); ?>
						</div>



						<?php
						//Begin Image and Text Section
						// check if the repeater field has rows of data
						if( have_rows('image_text_section') ):
						
						 	// loop through the rows of data
						    while ( have_rows('image_text_section') ) : the_row();
						
						        // display a sub field value
						  		?>
						  			<div class="six columns calloutImg">
						  				<?php $imgtxt = get_sub_field('section_image');
						  					$img = wp_get_attachment_image_src( $imgtxt, 'large' );
						  					echo '<img src="'.$img[0] . '" />'; ?>

						  			</div>

						  			<div class="six columns calloutText">
						  				<?php the_sub_field('section_text'); ?>
						  			</div>
						  			<div class="clearfix"></div>
									<?php 
						    endwhile;
						
						else :
						
						
						endif;
						//End Image and Text Section
						?>

						<?php
						
						// check if the repeater field has rows of data
						if( have_rows('infographic') ):
						
						 	// loop through the rows of data
						    while ( have_rows('infographic') ) : the_row();
						
						        // display a sub field value
						        $img = get_sub_field('infographic_image');
						        ?>
						        <div class="infographicHome">
						       		<img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" class="aligncenter"/>
						        </div>
						        <?php
						
						    endwhile;
						
						else :
						
						    // no rows found
						
						endif;
						
						?>

				<?php endwhile; // end of the loop. ?>


					<div class="homeCallOuts">
							<div class="four columns text-center">
								<a class="cta faq button" href="<?php echo get_the_permalink('18'); ?>">FAQ</a>
							</div>
							<div class="four columns text-center">
								<a class="cta events button" href="/category/events/">Events</a>
							</div>
							<div class="four columns text-center">
								<a class="cta newsletter button" href="#">Newsletter</a>							
							</div>
					</div>
			</div>



		</div><!-- /#main -->

	</div><!-- End Content row -->

<?php get_footer(); ?>