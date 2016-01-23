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
        <?php eyelikedesign_archive_title(); ?>
        <?php while ( have_posts() ) : the_post(); ?>

          <div class="three columns hex">
            <?php if ( has_post_thumbnail() ) : ?>  
                <?php the_post_thumbnail( 'thumbnail', array( 'class' => 'hexImage') ); ?>            
            <?php endif; ?>
            <svg xml:space="preserve" viewBox="0 0 240 240">
              <path class="svgMask" d="M0-1v242.8h241V-1H0z M119.7,9.4c2.6,0,5.1,0.6,7.4,1.9l83,48.1c4.6,2.6,7.4,7.5,7.4,12.8
  l0.2,95.9c0,5.3-2.8,10.2-7.4,12.8l-82.7,47.7c-4.6,2.7-10.3,2.7-14.9,0l-83-48.1c-4.6-2.6-7.4-7.5-7.4-12.8l-0.1-95.9
  c0-5.3,2.8-10.2,7.4-12.8l82.7-47.7C114.6,10,117.2,9.4,119.7,9.4z"/>
            </svg>
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
    </div>

    <aside id="sidebar" class="four columns" role="complementary">
      <div class="sidebar-box">
        <?php get_sidebar(); ?>
      </div>
    </aside><!-- /#sidebar -->
  </div>
<?php get_footer(); ?>