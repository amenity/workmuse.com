<?php
/**
 * Entry meta in the footer of posts of all post formats
 *
 * Overwrite entry-meta.php in child theme or use entry-meta-{$post-format}.php
 * to overwrite this for specific content on each post format.
 *
 * @package EyeLikeDesign
 * @since EyeLikeDesign 0.6.0
 */
?>
            <!-- START: entry-meta.php -->

            <?php if ( comments_open() ) : ?>
            <?php if ( $show_sep ) : ?>
            <span class="sep"> | </span>
            <?php endif; // End if $show_sep ?>
            <span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'eyelikedesign' ) . '</span>', __( '<b>1</b> Reply', 'eyelikedesign' ), __( '<b>%</b> Replies', 'eyelikedesign' ) ); ?></span>
            <?php endif; // End if comments_open() ?>

            <!-- END: entry-meta.php -->