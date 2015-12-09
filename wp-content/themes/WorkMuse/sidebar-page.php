<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.1.0
 */
?>
        <!-- START: sidebar.php -->
		<div id="secondary" class="widget-area" role="complementary">
            <!-- Video Link -->
            <div class="hex video">
                  <?php     
                      $args = array(                       
                            'post_type'     => 'sidebarlink',
                            'p' => 522,
                        );

                    $video = new WP_Query( $args );

                    // The Loop
                    if ( $video->have_posts() ) {
                        while ( $video->have_posts() ) {
                            $video->the_post();
                            $img = get_field('image'); 
                            $img = wp_get_attachment_image_src( $img, 'full' );?>
                            <a href="<?php the_field('link') ?>" class="lbp_secondary" data-lightboxplus="videolink"><img src="<?php echo $img[0]; ?>" /></a>
                    <?php 
                        }
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                ?>
            </div>
            <!-- Testimonial Query -->
            <div class="hex testimonial">
                <?php     /**
                     * The WordPress Query class.
                     * @link http://codex.wordpress.org/Function_Reference/WP_Query
                     *
                     */
                    $args = array(                       
                        'post_type'     => 'testimonial',
                        'orderby'       => 'rand',
                       'posts_per_page' => 1,
                    );
                
                $testimonials = new WP_Query( $args );

                // The Loop
                if ( $testimonials->have_posts() ) {
                    while ( $testimonials->have_posts() ) {
                        $testimonials->the_post();
                        the_content();
                    }
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
                wp_reset_postdata();
                 ?>
            </div>
        <!-- End Testimonial -->
        <!-- Other thing -->
        <div class="hex">
         <?php     
                              $args = array(                       
                                    'post_type'     => 'sidebarlink',
                                    'post__not_in' => array('522'),
                                );

                            $links = new WP_Query( $args );

                            // The Loop
                            if ( $links->have_posts() ) {
                                while ( $links->have_posts() ) {
                                    $links->the_post();
                                    $img = get_field('image'); 
                                    $img = wp_get_attachment_image_src( $img, 'full' );?>
                                    <a href="<?php the_field('link') ?>" target="_blank"><img src="<?php echo $img[0]; ?>" /></a>
                            <?php 
                                }
                            } else {
                                // no posts found
                            }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                        ?>
        </div>

        
			<?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>


			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
        <!-- END: sidebar.php -->