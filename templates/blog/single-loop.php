<?php if (have_posts()) while (have_posts()) : the_post(); ?>
<div id="single-header" class="uk-padding-small">
  <section class="uk-container">
    <div class="uk-text-center">
      <h1>
        <?php the_title(); ?>
      </h1>
      <div class="post-date"><span uk-icon="icon: calendar"></span><span class="the-date"><?php echo the_date(); ?></span></div>
      <div class="the-post-cats">
        <?php 
                $categories = get_the_category(); 
                foreach ($categories as $category) {
                    echo '<a class="uk-label uk-display-inline-block" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
                }
            ?>
      </div>
    </div>
  </section>
</div>
<!--/#single-header-->
<div id="single-post">
  <section class="uk-container uk-container-large">
    <div uk-grid class="uk-grid-collapse">
      <div class="uk-width-2-3@m">
        <div class="uk-padding uk-padding-remove-top">
          <div class="the-content">
            <?php the_content(); ?>
          </div>
          <div class="the-post-cats">
            <?php 
                $categories = get_the_category(); 
                foreach ($categories as $category) {
                    echo '<a class="uk-label uk-display-inline-block" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
                }
            ?>
          </div>
          <?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'twentyten'), 'after' => '</div>')); ?>
          <?php edit_post_link(__('Edit', 'twentyten'), '<span class="edit-link">', '</span>'); ?>
          <div class="uk-text-center post-pagination">
            <div title="Newer post">
              <?php next_post_link('%link', '%title <span class="meta-nav">' . _x('<span uk-icon="icon: chevron-right">', 'Next post link', 'twentyten') . '</span>'); ?>
            </div>
            <div title="Older post">
              <?php previous_post_link('%link', '<span class="meta-nav">' . _x('<span uk-icon="icon: chevron-left">', 'Previous post link', 'twentyten') . '</span> %title'); ?>
            </div>
          </div>
        </div>
        <div id="comments">
          <?php if ( ! post_password_required() ) comments_template( '', true );?>
        </div>
      </div>
      <?php endwhile; // end of the loop. ?>
      <div class="uk-width-1-3@m">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </section>
</div>
<footer id="about-footer">
  <section class="container">
    <div class="row about">
      <div class="col m5">
        <img class="responsive-img z-depth-1" src="<?php echo get_stylesheet_directory_uri(); ?>/img/about-author.jpg" alt="My face :)" title="My face :)" />
      </div>
      <div class="col m7 center-align">
        <h3 class="teal-text text-lighten-2">About the author</h3>
        <p>Michael Gillam is a Web Application Developer living in the western suburbs of Chicago in Naperville, IL. He is currently working as a Software Developer at <a href="https://www.adgooroo.com/" target="_blank">AdGooroo</a> in Chicago, IL. In his
          spare time, he enjoys gaming, coding, watching movies, traveling and road biking.</p>
      </div>
    </div>
    <!--/.row-->
  </section>
</footer>