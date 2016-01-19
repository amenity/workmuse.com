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
    <!-- First Hex Link: Video -->
    <div class="hexSide dottedBorder bottomDots">
        <?php
            global $wp_query;
            $postid = $wp_query->post->ID;
            $sidebarlinkid = get_post_meta($postid, 'first_hex_link', true); 
            $link = get_field('link', $sidebarlinkid);
            $img = get_field('image', $sidebarlinkid); 
            $img = wp_get_attachment_image_src($img, 'thumbnail' ); 
            
            $video = get_field('video', $sidebarlinkid);
        ?>      
        <a href="<?php echo $link ?>?rel=0" <?php if($video > 0) {echo 'class="lbp_secondary"';} else {echo 'class="lbp_primary"';} ?> data-lightboxplus="videolink">
            <img src="<?php echo $img[0]; ?>" class="hexImage" />
            <svg xml:space="preserve" viewBox="0 0 240 240">
              <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
                l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
                c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
            </svg>
        </a>
        <?php 
            wp_reset_query(); 
        ?>
    </div>
    <!-- Testimonial -->
    <div class="hexWrap dottedBorder bottomDots">
    <a data-reveal-id="myModal" href="#" class="modalReveal">
        <img src="<?php echo get_stylesheet_directory_uri().'/images/hex_motif_yellow.svg'; ?>" class="hexMotif"/>
        <div class="hexTestimonial">
            <?php
                global $wp_query;
                $postid = $wp_query->post->ID;
                $testimonialid = get_post_meta($postid, 'testimonial_option', true);        
                $this_excerpt = get_field('excerpt', $testimonialid); 
                $this_testifier = get_the_title($testimonialid); 
                echo '<p>'. $this_excerpt .'</p><p class="testifier">'. $this_testifier .'</p>';
                
            ?>
        </div>
        </a>
    </div>
<!-- Inline Flyout -->
    <div id="myModal" class="reveal-modal large">
            <div class="putty dottedHex">
                <div class="four columns ">
                    <div class="centerIt">
                        <div class="hex lefty">
                            <?php echo get_the_post_thumbnail( $testimonialid, 'thumbnail', array( 'class' => 'aligncenter') ); ?>
                                                <svg xml:space="preserve" viewBox="0 0 240 240">
                                                  <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
                            l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
                            c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z" />
                                                </svg>
                        </div>
                    </div>
                </div>
                <div class="eight columns dottedBorder leftDots">
                <div class="innerFix2">
                <h3 class="text-center"><span class="grandHotel"><?php echo $this_testifier; ?></span></h3>
                
                <?php 
                    $content_post = get_post($testimonialid);
                    $content = $content_post->post_content;
                    $content = apply_filters('the_content', $content);
                    $content = str_replace(']]>', ']]&gt;', $content);
                    echo $content;
                 ?>
                 </div>
                 </div>
            </div>
            <a class="close-reveal-modal">&#215;</a>
        </div>
    <?php wp_reset_query(); ?>
    <!-- End Inline Flyout -->
    <!-- End Testimonial -->
    <div style="clear: both;"></div>
   <!-- Second Hex Link -->
    <div class="hexSide">
        <?php
            global $wp_query;
            $postid = $wp_query->post->ID;
            $sidebarlinkid = get_post_meta($postid, 'second_hex_link', true); 
            $link = get_field('link', $sidebarlinkid);
            $img = get_field('image', $sidebarlinkid); 
            $img = wp_get_attachment_image_src($img, 'thumbnail' ); 
            $video = get_field('video', $sidebarlinkid);

        ?>      
        <a href="<?php echo $link ?>" <?php if($video ) {echo 'class="lbp_secondary"';} else {echo 'class="lbp_primary"';} ?> data-lightboxplus="otherlink">
            <img src="<?php echo $img[0]; ?>" class="hexImage" />
            <svg xml:space="preserve" viewBox="0 0 240 240">
              <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
                l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
                c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
            </svg>
        </a>
        <?php 
            wp_reset_query(); 
        ?>
    </div>
    <?php if ( ! dynamic_sidebar( 'sidebar-page' ) ) : ?>
    <?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->
<!-- END: sidebar.php -->