<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('post_type' => 'post', 'posts_per_page' => 5, 'paged' => $paged);
        $wp_query = new WP_Query($args);
        while (have_posts()) : the_post();
    ?>
    <?php get_template_part('templates/blog/entry'); ?>
    <?php endwhile; ?>
<?php get_footer(); ?>