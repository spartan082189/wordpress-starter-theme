<?php if (have_posts()) while (have_posts()) : the_post(); ?>
  <div id="single-header">
    <section class="container">
        <div class="row center-align">
          <h1 class="teal-text text-lighten-2"><?php the_title(); ?></h1>
          <div class="post-date"><i class="material-icons date-icon">date_range</i> <?php echo the_date(); ?></div>
          <p><?php the_category(); ?></p>
        </div>
    </section>
  </div> <!--/#single-header-->
  <div id="single-post">
    <section class="container">
      <div class="row">
        <div class="col m9 s12">
          <div class="the-content"><?php the_content(); ?></div>
          <p><?php the_category(); ?></p>
          <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'twentyten'), 'after' => '</div>')); ?>
          <?php edit_post_link(__('Edit', 'twentyten'), '<span class="edit-link">', '</span>'); ?>
          <div class="center-align post-pagination">
            <div title="Newer post">
              <?php next_post_link('%link', '%title <span class="meta-nav">' . _x('<i class="material-icons">keyboard_arrow_right</i>', 'Next post link', 'twentyten') . '</span>'); ?>
            </div>
            <div title="Older post">
              <?php previous_post_link('%link', '<span class="meta-nav">' . _x('<i class="material-icons">keyboard_arrow_left</i>', 'Previous post link', 'twentyten') . '</span> %title'); ?>
            </div>
          </div><!-- #nav-below -->
        </div>
        <?php endwhile; // end of the loop. ?>
      <div class="col m3 s12">
          <?php get_sidebar(); ?>
      </div>
    </div><!--/.row-->
  </section>
</div>
<div id="comments">
    <?php if ( ! post_password_required() ) comments_template( '', true );?>
</div>
<footer id="about-footer">
  <section class="container">
      <div class="row about">
          <div class="col m5">
              <img class="responsive-img z-depth-1" src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-author.jpg" alt="My face :)"
              title="My face :)" />
          </div>
          <div class="col m7 center-align">
              <h3 class="teal-text text-lighten-2">About the author</h3>
              <p>Michael Gillam is a Web Application Developer living in the western suburbs of Chicago in Naperville, IL. He is
                  currently working as a Software Developer at <a href="https://www.adgooroo.com/" target="_blank">AdGooroo</a>
                  in Chicago, IL. In his spare time, he enjoys gaming, coding, watching movies, traveling and road biking.</p>
          </div>
      </div><!--/.row-->
  </section>
</footer>