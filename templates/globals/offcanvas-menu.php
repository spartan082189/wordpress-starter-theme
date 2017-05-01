<!-- ########## OFF CANVAS NAV MENU ########## -->
<div id="offcanvas-push" uk-offcanvas="mode: push; overlay: true">
  <div id="nav" class="uk-offcanvas-bar">
    <nav>
      <h2 class="uk-heading-bullet uk-text-center">Theme Name</h2>
      <ul class="uk-list">
        <?php if ( is_front_page () ) : ?>
          <li><a href='<?php echo site_url(); ?>#home' class="uk-display-block" uk-scroll><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
          <li><a href='<?php echo site_url(); ?>/blog' class="uk-display-block"><i class="fa fa-comments" aria-hidden="true"></i><span>Blog</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#services' class="uk-display-block" uk-scroll><i class="fa fa-cogs" aria-hidden="true"></i><span>Section 1</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#about' class="uk-display-block" uk-scroll><i class="fa fa-user" aria-hidden="true"></i><span>Section 2</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#portfolio' class="uk-display-block" uk-scroll><i class="fa fa-folder" aria-hidden="true"></i><span>Section 3</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#testimonials' class="uk-display-block" uk-scroll><i class="fa fa-users" aria-hidden="true"></i><span>Section 4</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#contact' class="uk-display-block" uk-scroll><i class="fa fa-envelope" aria-hidden="true"></i><span>Section 5</span></a></li>
        <?php else : ?>
          <li><a href='<?php echo site_url(); ?>#home' class="uk-display-block"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a></li>
          <li><a href='<?php echo site_url(); ?>/blog' class="uk-display-block"><i class="fa fa-comments" aria-hidden="true"></i><span>Blog</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#services' class="uk-display-block"><i class="fa fa-cogs" aria-hidden="true"></i><span>Section 1</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#about' class="uk-display-block"><i class="fa fa-user" aria-hidden="true"></i><span>Section 2</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#portfolio' class="uk-display-block"><i class="fa fa-folder" aria-hidden="true"></i><span>Section 3</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#testimonials' class="uk-display-block"><i class="fa fa-users" aria-hidden="true"></i><span>Section 4</span></a></li>
          <li><a href='<?php echo site_url(); ?>/#contact' class="uk-display-block"><i class="fa fa-envelope" aria-hidden="true"></i><span>Section 5</span></a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</div>