<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
get_header(); ?>

	
		
				<?php
				$i = 1;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				query_posts( array(
					'posts_per_page' => 6,
					'post_type' => 'case-studies',
					'paged' => $paged,
					) );
				if( have_posts() ) :?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="<?php if($i % 2 == 0) {echo 'putty';} else {echo 'charcoal';} ?>">
				<div class="row">

					<div id="main" class="twelve columns" role="main">
						<div class="post-box">
							<?php if($i % 2 != 0) { ?>
								<div class="four columns matchHeight">
								<div class="centerIt">
								<div class="hex">
									 <?php if ( has_post_thumbnail() ) : ?>
									 	<a href="<?php the_field('video_link') ?>?rel=0" class="lbp_secondary" data-lightboxplus="<?php echo $post->ID; ?>">
											<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'aligncenter') ); ?>						
											<svg xml:space="preserve" viewBox="0 87.45 614.55 619.14">
							          <path class="svgMask" d="M0,87.45v619.14h614.55V87.45H0z M305.235,113.97c6.63,0,13.005,1.53,18.871,4.845L535.755,241.47
							            c11.73,6.63,18.87,19.125,18.87,32.64l0.51,244.545c0,13.515-7.14,26.01-18.87,32.64L325.38,672.93
							            c-11.729,6.886-26.265,6.886-37.995,0L75.735,550.275c-11.73-6.631-18.87-19.125-18.87-32.641L56.61,273.09
							            c0-13.515,7.14-26.01,18.87-32.64l210.885-121.635C292.23,115.5,298.86,113.97,305.235,113.97z"/>
							          <path class="svgWindow" d="M305.241,115.53c6.57,0,12.887,1.517,18.7,4.802l209.728,121.541c11.625,6.57,18.7,18.951,18.7,32.344
							            l0.504,242.327c0,13.392-7.074,25.773-18.699,32.344l-208.971,120.53c-11.622,6.823-26.026,6.823-37.649,0L77.824,547.875
							            c-11.624-6.57-18.699-18.951-18.699-32.344l-0.253-242.326c0-13.392,7.075-25.774,18.699-32.343l208.971-120.531
							            C292.354,117.046,298.924,115.53,305.241,115.53z"/>
							          <path class="svgOutline" d="M568.597,266.194c0-14.282-7.541-27.485-19.931-34.492L325.13,102.09c-6.195-3.503-12.928-5.12-19.931-5.12
							            c-6.733,0-13.735,1.617-19.93,5.12L62.54,230.625c-12.389,7.006-19.93,20.209-19.93,34.491l0.27,258.417
							            c0,14.282,7.541,27.484,19.93,34.492l223.537,129.611c12.39,7.276,27.741,7.276,40.129,0l222.729-128.534
							            c12.389-7.006,19.93-20.21,19.93-34.491L568.597,266.194z M534.173,548.887l-208.971,120.53c-11.622,6.823-26.026,6.823-37.649,0
							            L77.824,547.875c-11.624-6.57-18.699-18.951-18.699-32.344l-0.253-242.326c0-13.392,7.075-25.774,18.699-32.343l208.971-120.531
							            c5.812-3.285,12.382-4.802,18.699-4.802c6.57,0,12.887,1.517,18.7,4.802l209.728,121.541c11.625,6.57,18.7,18.951,18.7,32.344
							            l0.504,242.327C552.872,529.935,545.798,542.316,534.173,548.887z"/>
							        </svg>
										</a>
									<?php endif; ?>
								</div>
								</div>
								</div>
							<?php } else { ?>
								<div class="eight columns matchHeight">
								<h3 class="text-center"><span class="grandHotel"><?php the_title(); ?></span><br/><?php the_field('tag_line'); ?></h3>
									<?php the_content(); ?>
								</div>
							<?php } ?>
							<?php if($i % 2 == 0) { ?>
							<div class="four columns dottedBorder leftDots matchHeight">
							<div class="centerIt">
							<div class="hex">
								 <?php if ( has_post_thumbnail() ) : ?>  
										<a href="<?php the_field('video_link') ?>?rel=0" class="lbp_secondary" data-lightboxplus="<?php echo $post->ID; ?>">
											<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'aligncenter') ); ?>						
												<svg xml:space="preserve" viewBox="0 87.45 614.55 619.14">
								          <path class="svgMask" d="M0,87.45v619.14h614.55V87.45H0z M305.235,113.97c6.63,0,13.005,1.53,18.871,4.845L535.755,241.47
								            c11.73,6.63,18.87,19.125,18.87,32.64l0.51,244.545c0,13.515-7.14,26.01-18.87,32.64L325.38,672.93
								            c-11.729,6.886-26.265,6.886-37.995,0L75.735,550.275c-11.73-6.631-18.87-19.125-18.87-32.641L56.61,273.09
								            c0-13.515,7.14-26.01,18.87-32.64l210.885-121.635C292.23,115.5,298.86,113.97,305.235,113.97z"/>
								          <path class="svgWindow" d="M305.241,115.53c6.57,0,12.887,1.517,18.7,4.802l209.728,121.541c11.625,6.57,18.7,18.951,18.7,32.344
								            l0.504,242.327c0,13.392-7.074,25.773-18.699,32.344l-208.971,120.53c-11.622,6.823-26.026,6.823-37.649,0L77.824,547.875
								            c-11.624-6.57-18.699-18.951-18.699-32.344l-0.253-242.326c0-13.392,7.075-25.774,18.699-32.343l208.971-120.531
								            C292.354,117.046,298.924,115.53,305.241,115.53z"/>
								          <path class="svgOutline" d="M568.597,266.194c0-14.282-7.541-27.485-19.931-34.492L325.13,102.09c-6.195-3.503-12.928-5.12-19.931-5.12
								            c-6.733,0-13.735,1.617-19.93,5.12L62.54,230.625c-12.389,7.006-19.93,20.209-19.93,34.491l0.27,258.417
								            c0,14.282,7.541,27.484,19.93,34.492l223.537,129.611c12.39,7.276,27.741,7.276,40.129,0l222.729-128.534
								            c12.389-7.006,19.93-20.21,19.93-34.491L568.597,266.194z M534.173,548.887l-208.971,120.53c-11.622,6.823-26.026,6.823-37.649,0
								            L77.824,547.875c-11.624-6.57-18.699-18.951-18.699-32.344l-0.253-242.326c0-13.392,7.075-25.774,18.699-32.343l208.971-120.531
								            c5.812-3.285,12.382-4.802,18.699-4.802c6.57,0,12.887,1.517,18.7,4.802l209.728,121.541c11.625,6.57,18.7,18.951,18.7,32.344
								            l0.504,242.327C552.872,529.935,545.798,542.316,534.173,548.887z"/>
								        </svg>
										</a>
								<?php endif; ?>
							</div>
							</div>
							</div>
							<?php } else { ?>
								<div class="eight columns dottedBorder leftDots matchHeight">
								<h3 class="text-center"><span class="grandHotel"><?php the_title(); ?></span><br/><?php the_field('tag_line'); ?></h3>
									<?php the_content(); ?>
								</div>
							<?php } ?>
							</div>
				</div>
				</div>
				</div>
				</div>
				<?php
				$i++;
				 endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
			<div class="row" style="margin-top:30px;">
			<div class="twelve columns">
			<?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
				eyelikedesign_pagination();
			} ?>

			</div>
		</div>

	</div>
<?php get_footer(); ?>