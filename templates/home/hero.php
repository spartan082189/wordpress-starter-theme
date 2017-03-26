<!-- ########## HERO/HOME ########## -->
<section id="hero" uk-height-viewport>
  <?php get_template_part('templates/globals/navigation'); ?>
    <div class="uk-container uk-text-center content">
      <h1 uk-scrollspy="cls:uk-animation-slide-top-small; delay: 100; repeat: true">Your Organization</h1>
      <h2 uk-scrollspy="cls:uk-animation-slide-top-small; delay: 300; repeat: true">Some facny tag line goes here...</h2>
      <a uk-scrollspy="cls:uk-animation-slide-top-small; delay: 400; repeat: true" class="uk-button uk-button-large uk-button-primary" href="<?php echo site_url(); ?>/blog">
        My Blog <i class="fa fa-comments"></i>
      </a>
      <ul class="uk-list social-links" uk-scrollspy="cls:uk-animation-slide-top-small; delay: 500; repeat: true">
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-facebook fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-twitter fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-linkedin fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-dribbble fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-youtube fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-github fa-2x"></i></a></li>
      </ul>
      <div class="uk-textt-center uk-padding scroll-down" uk-scrollspy="cls:uk-animation-slide-top-small; delay: 1100; repeat: true">
        <a href="#services" title="Scroll down" uk-scroll><i class="fa fa-chevron-down fa-2x"></i></a>
      </div>
    </div>
</section>
<!-- / #hero -->