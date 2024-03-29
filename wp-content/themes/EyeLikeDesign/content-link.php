<?php
/**
 * The template for displaying posts in the Link Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
	<!-- START: content-link.php -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-meta">
			<?php eyelikedesign_posted_on(); ?>
			<span class="label radius secondary"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'eyelikedesign' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _ex( 'Link', 'Post format title', 'eyelikedesign' ); ?></a></span>
		</div>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'eyelikedesign' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php get_template_part('entry-meta', get_post_format() ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post -->
	<!-- END: content-link.php -->