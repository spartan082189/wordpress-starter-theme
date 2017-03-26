<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
<div id="blog">
  <section id="blog-hero">
    <?php get_template_part('templates/globals/navigation'); ?>
    <div class="uk-container uk-text-center content">
      <h1 uk-scrollspy="cls:uk-animation-slide-top-small; delay: 100; repeat: true">Journal</h1>
      <p uk-scrollspy="cls:uk-animation-slide-top-small; delay: 300; repeat: true">A collection of my thoughts...</p>
    </div>
  </section>    
  <section id="blog-posts">
    <div class="uk-container uk-container-large">
    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'post', 'posts_per_page' => 5, 'paged' => $paged);
        $wp_query = new WP_Query($args);
        while (have_posts()) : the_post();
    ?>
    <?php get_template_part('templates/blog/entry'); ?>
    <?php endwhile; ?>
    </div>
  </section>
</div>
<?php get_template_part('templates/globals/offcanvas-menu'); ?>
<?php get_footer(); ?>