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

            <?php if(get_field('default') == 1) {; ?>
            <div class="hexVideo dottedBorder bottomDots">
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
                        $img = wp_get_attachment_image_src( $img, 'thumbnail' );?>
                        <a href="<?php the_field('link') ?>" class="lbp_secondary" data-lightboxplus="videolink">
                            <img src="<?php echo $img[0]; ?>" class="hexImage" />
                            <svg xml:space="preserve" viewBox="0 0 240 240">
                              <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
        l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
        c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
                            </svg>
                        </a>
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
            <div class="hexWrap dottedBorder bottomDots">
                <img src="<?php echo get_stylesheet_directory_uri().'/images/hex_motif_yellow.svg'; ?>" class="hexMotif"/>
                <div class="hexTestimonial">
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
                            echo '<p>'. get_field('excerpt') . '</p>';
                        }
                    } else {
                        // no posts found
                    }
                    /* Restore original Post Data */
                    wp_reset_postdata();
                     ?>
                </div>
            </div>
        <!-- End Testimonial -->
        <div style="clear: both;"></div>
        <!-- Other thing -->
        <div class="hexSecond">
         <?php     
            $args = array(                       
                'post_type' => 'sidebarlink',
                'post__not_in' => array('522'),
            );

            $links = new WP_Query( $args );

            // The Loop
            if ( $links->have_posts() ) {
                while ( $links->have_posts() ) {
                    $links->the_post();
                    $img = get_field('image'); 
                    $img = wp_get_attachment_image_src($img, 'thumbnail' );?>
                    <a href="<?php the_field('link') ?>" class="lbp_secondary" data-lightboxplus="otherlink">
                        <img src="<?php echo $img[0]; ?>" class="hexImage" />
                        <svg xml:space="preserve" viewBox="0 0 240 240">
                          <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
    l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
    c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
                        </svg>
                    </a>
            <?php 
                }
            } else {
                // no posts found
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        ?>
        </div>
        <?php
            //End Default setting
         } else { 
            //Begin Custom Setting
        ?>

            <?php
            
            // check if the repeater field has rows of data
            if( have_rows('custom_sidebar_sections') ):
            
                 // loop through the rows of data
                while ( have_rows('custom_sidebar_sections') ) : the_row();
            
                    // display a sub field value
                    if(get_sub_field('hex_link') == 1) {
                        //Hex Link.
                        echo '<div class="hexWrap dottedBorder bottomDots">';
                        $id = get_sub_field('linked_object');
                                        $img = get_field('image', $id[0]); 
                                        $img = wp_get_attachment_image_src($img, 'thumbnail' );?>
                                        <a href="<?php the_field('link') ?>" class="lbp_secondary" data-lightboxplus="otherlink">
                                            <img src="<?php echo $img[0]; ?>" class="hexImage" />
                                            <svg xml:space="preserve" viewBox="0 0 240 240">
                                              <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
                        l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
                        c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
                                            </svg>
                                        </a>
                        <?php 
                        echo '</div>';
                    } else {
                        //Custom Content
                        echo '<div class="dottedBorder bottomDots">';
                        echo get_sub_field('custom_content');
                        echo '</div>';
                    }
            
                endwhile;
            
            else :
            
                // no rows found
            
            endif;
            }
            ?>
        
			<?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>


			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
        <!-- END: sidebar.php -->