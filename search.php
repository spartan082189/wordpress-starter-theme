<?php get_header(); ?>
<div id="search">
  <div id="search-hero">
    <?php get_template_part('templates/globals/navigation'); ?>
    <section class="uk-container">
        <div class="uk-text-center">
          <i class="fa fa-search" aria-hidden="true"></i>
          <h1 uk-scrollspy="cls:uk-animation-slide-top-small; delay: 100; repeat: true">
            <?php printf(__('Search Results for: %s'), '<span>' . get_search_query() . '</span>'); ?>
          </h1>
        </div>
    </section>
  </div><!--/#search-hero-->
  <div id="search-content">
      <section class="uk-container uk-container-large">
          <div uk-grid class="uk-grid-collapse uk-margin-top">
              <div class="uk-width-2-3@m">
                  <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post() ?>
                        <?php get_template_part('templates/blog/entry-simple'); ?>
                    <?php endwhile; ?>
                  <?php else : ?>
                      <div id="no-posts" class="uk-text-center">
                        <h2 class="teal-text text-lighten-2"><?php _e('Nothing Found!', 'blankslate') ?></h2>
                        <p><?php _e('Sorry, but I could not find anything to match your search. Please try again.', 'blankslate'); ?></p>
                      </div>
                      <?php get_template_part('searchform') ?>
                  <?php endif; ?>
                  <?php get_template_part('nav', 'below'); ?>
              </div>
              <div class="uk-width-1-3@m">
                  <?php get_sidebar(); ?>
              </div>
          </div>
      </section>
  </div><!--/#search-content-->
</div><!--/#search-->
<?php get_template_part('templates/globals/offcanvas-menu'); ?>
<?php get_footer(); ?>