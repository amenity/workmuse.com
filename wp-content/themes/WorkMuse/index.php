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

					<div class="three columns">
              <div class="hexy">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 195.5 221.4" xml:space="preserve">
                  <path class="roundedHex" d="M90.5,219.3l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8L0,62.5c0-5.3,2.8-10.2,7.4-12.8L90.1,2  c4.6-2.6,10.2-2.6,14.8,0l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7  C100.8,222,95.1,222,90.5,219.3z" />
                </svg>
                <div class="date">
                  <h3><?php the_field('event_date'); ?> </h3>
                </div>  
              </div>
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