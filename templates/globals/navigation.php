<!-- Sticky nav -->
<header uk-sticky="animation: uk-animation-slide-top; top: 150; bottom: #footer" id="sticky-menu">
  <div class="uk-container uk-container-large">
    <!-- Sticky Header -->
    <div class="uk-visible@l sticky" uk-grid>
      <div class="uk-width-3-4">
        <?php if( is_front_page() ) : ?>
        <ul class="uk-list uk-text-right" uk-scrollspy-nav="closest: li > a; scroll: true">       
          <li class="uk-display-inline-block uk-padding-small"><a href='#home' class="uk-display-block" uk-scroll><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
          <li class="uk-display-inline-block uk-padding-small"><a href='#services' class="uk-display-block" uk-scroll><i class="fa fa-cogs" aria-hidden="true"></i><span>Services</span></a></li>
          <li class="uk-display-inline-block uk-padding-small"><a href='#about' class="uk-display-block" uk-scroll><i class="fa fa-user" aria-hidden="true"></i><span>About Me</span></a></li>
          <li class="uk-display-inline-block uk-padding-small"><a href='#portfolio' class="uk-display-block" uk-scroll><i class="fa fa-folder" aria-hidden="true"></i><span>Folio</span></a></li>
          <li class="uk-display-inline-block uk-padding-small"><a href='#testimonials' class="uk-display-block" uk-scroll><i class="fa fa-users" aria-hidden="true"></i><span>Clients</span></a></li>
          <li class="uk-display-inline-block uk-padding-small"><a href='#contact' class="uk-display-block" uk-scroll><i class="fa fa-envelope" aria-hidden="true"></i><span>Get In Touch</span></a></li>
        </ul>
        <?php elseif ( is_page('Blog') ): ?>
        <ul class="uk-list uk-text-left" uk-scrollspy-nav="closest: li > a; scroll: true">
          <li class="uk-display-inline-block uk-padding-small"><a href='<?php echo site_url(); ?>' class="uk-display-block"><i class="fa fa-home" aria-hidden="true"></i><span>Back Home</span></a></li>
        </ul>
        <?php else: ?>
        <ul class="uk-list uk-text-left" uk-scrollspy-nav="closest: li > a; scroll: true">
          <li class="uk-display-inline-block uk-padding-small"><a href='<?php echo site_url(); ?>' class="uk-display-block"><i class="fa fa-home" aria-hidden="true"></i><span>Back Home</span></a></li>
          <li class="uk-display-inline-block uk-padding-small"><a href='<?php echo site_url(); ?>/blog' class="uk-display-block"><i class="fa fa-comments" aria-hidden="true"></i><span>All Blog Posts</span></a></li>
        </ul>
        <?php endif; ?>
      </div>
      <div class="uk-width-1-4 uk-text-right"><a class="uk-logo uk-display-inline-block uk-padding-small" href="#hero" uk-scroll>LOGO</a></div>
    </div>
    <!-- Standard Header -->
    <div class="uk-width-1-1 non-sticky">
      <div uk-grid class="uk-grid-collapse">
        <div class="uk-width-1-2">
          <a href="javascript:void(0);" class="toggle-menu-btn uk-display-inline-block" uk-toggle="target: #offcanvas-push"><i class="fa fa-bars fa-2x"></i></a>
        </div>
        <div class="uk-width-1-2 uk-text-right">
          <a href="<?php echo site_url(); ?>" class="uk-logo uk-display-inline-block">LOGO</a>
        </div>
      </div>
    </div>
  </div>
</header>