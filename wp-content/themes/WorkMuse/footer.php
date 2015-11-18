<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the class=container div and all content after
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
		<?php
			/*
				A sidebar in the footer? Yep. You can can customize
				your footer with three columns of widgets.
			*/
			if ( ! is_404() )
				get_sidebar( 'footer' );
			?>
			<div id="footer" class="row" role="contentinfo">
				<div class="twelve columns">
					<a href="https://twitter.com/work_muse">
			    <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" />
			    </a>
			    <a href="https://www.facebook.com/workmuse">
			    <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook.png" width="35" height="35" />
			    </a>
			    <a href="https://instagram.com/workmuse/">
			    <img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" />
			    </a>
					<hr />
				</div>
				<div class="four columns">
					<?php do_action( 'eyelikedesign_credits' ); ?>
					<p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'eyelikedesign' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'eyelikedesign' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'eyelikedesign' ), 'WordPress' ); ?></a></p>
				</div>
				<div class="eight columns">
					<?php wp_nav_menu( array(
						'theme_location' => 'secondary',
						'container' => false,
						'menu_class' => 'inline-list right',
						'fallback_cb' => false
					) ); ?>
				</div>
			</div>
	</div><!-- Container End -->

	<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	     chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 7]>
		<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); ?>
</body>
</html>