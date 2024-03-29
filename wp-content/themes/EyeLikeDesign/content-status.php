<?php
/**
 * The default template for displaying status content
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
	<!-- START: content-status.php -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<a class="status-avatar-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'eyelikedesign' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'eyelikedesign_status_avatar', '48' ) ); ?></a>
			<h1 class="entry-title"><?php the_author(); ?></h1>
		</header><!-- .entry-header -->
		<div class="entry-meta">
			<?php eyelikedesign_posted_on(); ?>
			<span class="label radius secondary"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'eyelikedesign' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _ex( 'Status', 'Post format title', 'eyelikedesign' ); ?></a></span>
		</div>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'eyelikedesign' ) ); ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<?php get_template_part('entry-meta', get_post_format() ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
	<!-- END: content-status.php -->