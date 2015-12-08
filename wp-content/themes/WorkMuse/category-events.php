<?php
/**
 * The template for displaying Events posts
 */
get_header(); ?>

  <!-- Row for main content area -->
  <div id="content" class="row">

    <div id="main" class="eight columns" role="main">
      <div class="post-box">
      <?php if ( have_posts() ) : ?>

        <?php
          /* Queue the first post, that way we know
           * what author we're dealing with (if that is the case).
           *
           * We reset this later so we can run the loop
           * properly with a call to rewind_posts().
           */
          the_post();

          /* Get the archive title for the specific archive we are
           * dealing with.
           */
          //eyelikedesign_archive_title();

          /* Since we called the_post() above, we need to
           * rewind the loop back to the beginning that way
           * we can run the loop properly, in full.
           */
          rewind_posts();
        ?>

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <?php
            /* Include the Post-Format-specific template for the content.
             * If you want to overload this in a child theme then include a file
             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
             */
            //get_template_part( 'content', get_post_format() );

          ?>
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
        <?php //get_template_part( 'content', 'none' ); ?>

       
      <?php endif; ?>

      <?php if ( function_exists( 'eyelikedesign_pagination' ) ) {
        eyelikedesign_pagination();
      } ?>

      </div>
    </div>

    <aside id="sidebar" class="four columns" role="complementary">
      <div class="sidebar-box">
        <?php get_sidebar(); ?>
      </div>
    </aside><!-- /#sidebar -->
  </div>
<?php get_footer(); ?>