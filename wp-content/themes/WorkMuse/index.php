<?php
/**
 * The template for displaying all content.
 *
 * If there aren't any other templates present to
 * display content, it falls back to index.php
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */

get_header(); ?>

	<!-- Row for main content area -->
	<div id="content" class="row">

		<div id="main" class="eight columns" role="main">

			<div class="post-box">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="three columns hexCol">
            <?php if ( has_post_thumbnail() ) : ?>  
								<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'hexImage') ); ?>						
						<?php endif; ?>
						<svg xml:space="preserve" viewBox="0 0 240 240">
						  <path class="svgMask" d="M 0 -0.96484375 L 0 241.875 L 240.96484 241.875 L 240.96484 -0.96484375 L 0 -0.96484375 z M 119.75 9.3632812 C 122.3 9.3632812 124.85039 10.0125 127.15039 11.3125 L 210.15039 59.412109 C 214.75039 62.012109 217.55078 66.912891 217.55078 72.212891 L 217.75 168.11328 C 217.75 173.41328 214.94961 178.31211 210.34961 180.91211 L 127.65039 228.61328 C 123.05039 231.31328 117.35 231.31328 112.75 228.61328 L 29.75 180.51172 C 25.15 177.91172 22.349609 173.01289 22.349609 167.71289 L 22.25 71.8125 C 22.25 66.5125 25.050391 61.611719 29.650391 59.011719 L 112.34961 11.3125 C 114.64961 10.0125 117.2 9.3632812 119.75 9.3632812 z "  />
						</svg>
          </div>
          <div class="nine columns">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          	<?php the_excerpt(); ?>
          </div>
          <hr/>

				<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>

			<?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
				eyelikedesign_pagination();
			} ?>
			</div>

		</div><!-- /#main -->

		<aside id="sidebar" class="four columns" role="complementary">
			<div class="sidebar-box">
				<?php get_sidebar(); ?>
			</div>
		</aside><!-- /#sidebar -->

	</div><!-- End Content row -->

<?php get_footer(); ?>