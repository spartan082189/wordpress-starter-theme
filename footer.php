<?php get_template_part('templates/globals/social-media'); ?>
<!-- ########## FOOTER ########## -->
<footer id="footer" class="uk-padding-small">
  <div class="uk-container">
    <div class="uk-width-1-1">
      <ul class="uk-list footer-social-links uk-text-center">
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-facebook fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-twitter fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-linkedin fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-dribbble fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-youtube fa-2x"></i></a></li>
        <li class="uk-display-inline-block"><a href="javascript:void(0);"><i class="fa fa-github fa-2x"></i></a></li>
      </ul>
      <p class="uk-text-center">Copyright <?php echo date('Y'); ?>. Some company</p>
    </div>
  </div>
</footer>
<!-- /#footer -->

<!-- Back to top button -->
<a href="#hero" uk-totop uk-scroll title="I'm too lazy to scroll. Back to the top please :)"></a>

<?php wp_footer(); ?>
  <!-- Scripts -->
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/uikit/dist/js/uikit.min.js"></script>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/cycle.js"></script>
  <!-- <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/common.js"></script> -->
  </body>

  </html>