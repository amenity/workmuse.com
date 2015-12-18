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
				if( have_posts() ) :?>
				<?php while ( have_posts() ) : the_post(); ?>
				<div class="<?php if($i % 2 == 0) {echo 'putty';} else {echo 'charcoal';} ?>">
				<div class="row">

					<div id="main" class="twelve columns" role="main">
						<div class="post-box">
						<h3 class="text-center"><span class="grandHotel"><?php the_title(); ?></span><br/><?php the_field('tag_line'); ?></h3>
							<?php if($i % 2 != 0) { ?>
								<div class="four columns">
								<div class="hex">
									 <?php if ( has_post_thumbnail() ) : ?>  
											<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'aligncenter') ); ?>						
											<svg xml:space="preserve" viewBox="0 0 240 240">
											  <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
						l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
						c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
											</svg>
											<?php endif; ?>
								</div>
								</div>
							<?php } else { ?>
								<div class="eight columns" style="padding-top:30px;">
									<?php the_content(); ?>
								</div>
							<?php } ?>
							<?php if($i % 2 == 0) { ?>
							<div class="four columns">
							<div class="hex">
								 <?php if ( has_post_thumbnail() ) : ?>  
										<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'aligncenter') ); ?>						
											<svg xml:space="preserve" viewBox="0 0 240 240">
											  <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
									l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
									c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
											</svg>
								<?php endif; ?>
							</div>
							</div>
							<?php } else { ?>
								<div class="eight columns" style="padding-top:30px;">
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