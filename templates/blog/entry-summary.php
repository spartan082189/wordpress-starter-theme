<section>
<?php the_post_thumbnail('post-thumbnail', ['class' => 'uk-responsive-width', 'title' => 'Feature image']); ?>
<?php the_excerpt(); ?>
<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
</section>