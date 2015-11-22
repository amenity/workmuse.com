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
			<div id="footer" role="contentinfo">
				<div class="row dottedBorder bottomDots">
					<div class="four columns contact">
						<h3>Contact:</h3>
						<h4><a class="phone" href="tel:5127793818">512.779.3818</a></h4>
						<h4><a class="email"  href="hello@workmuse.com">hello@workmuse.com</a></h4>
					</div>
					<div class="logo four columns">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/workmuse_reverse_logo.svg" alt="Work Muse: A Job Share Solutions Firm">
						</a>
					</div>
					<div class="social four columns">
						<h3>Connect:</h3>
						<div>
							<a href="https://twitter.com/work_muse">
					    	<img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" />
					    </a>
					    <a href="https://www.facebook.com/workmuse">
					    	<img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook.png" width="35" height="35" />
					    </a>
					    <a href="https://instagram.com/workmuse/">
					    	<img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" />
					    </a>
					  </div>
					</div>
				</div>
				<div class="smallPrint row">
					<div class="twelve columns">
						<p>
							<span>Copyright <?php echo date('Y'); ?></span>
							<span><a href="/terms-conditions/">Terms and Conditions</a></span>
							<span>Site by <a href="http://eyelikedesign.com/" title="eyelikedesign Themes">EyeLikeDesign</a>.</span>
							<span><a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress</a>.</span>
						</p>
					</div>
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