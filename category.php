<?php get_header(); ?>
<div id="category">
    <section id="cat-hero">
        <?php get_template_part('templates/globals/navigation'); ?>
        <div class="uk-container uk-container-large uk-text-center">
            <h1 uk-scrollspy="cls:uk-animation-slide-top-small; delay: 100; repeat: true"><?php single_cat_title(); ?></h1>
        </div>
    </section>    
    <section id="cat-posts">
        <div class="uk-container uk-container-large">
            <div uk-grid class="uk-grid-collapse">
                <div class="uk-width-2-3@m">
                    <?php
                    $categorydesc = category_description();
                    if (!empty($categorydesc))
                        echo apply_filters('archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>');
                    ?>
                    <?php rewind_posts(); ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('templates/blog/entry-simple'); ?>
                    <?php endwhile; ?>
                </div>
                <div class="uk-width-1-3@m"><?php get_sidebar(); ?></div>
            </div>
        </div>    
    </section>    
</div>
<?php get_template_part('templates/globals/offcanvas-menu'); ?>    
<?php get_footer(); ?>