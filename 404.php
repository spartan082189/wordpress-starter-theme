<?php get_header(); ?>
<div id="not-found">
    <div id="not-found-header">
      <section class="container">
        <div class="row center-align">
          <i class="material-icons red-text text-darken-2">warning</i>
            <h1 class="teal-text text-lighten-2">Oh snap! Page not found!</h1>
        </div>
      </section>
    </div><!--/#not-found-header-->
    <div id="not-found-content">
        <section class="container">
            <div class="row center-align">
              <h2 class="red-text text-darken-2">You broke my website! Sound the alarms!</h2>
              <p class="teal-text text-lighten-2 champ"><?php _e('Just kidding :). Trying searching for something that actually exists champ.', 'blankslate'); ?></p>
            </div>
            <div class="row">
              <div><?php get_template_part('searchform') ?></div>
            </div>
        </section>
    </div><!--/#not-found-content-->
</div><!--/#404-->
<?php get_footer(); ?>