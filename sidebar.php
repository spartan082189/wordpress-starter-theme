<aside id="sidebar" class="uk-padding uk-padding-remove-top">
  <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
    <div id="primary" class="widget-area">
      <ul class="uk-list">
        <?php dynamic_sidebar( 'primary-widget-area' ); ?>
      </ul>
    </div>
    <?php endif; ?>
</aside>