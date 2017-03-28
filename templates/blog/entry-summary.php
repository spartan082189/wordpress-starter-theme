<section>
<?php //the_post_thumbnail('post-thumbnail', ['class' => 'uk-responsive-width', 'title' => 'Feature image']); ?>
<p class="uk-text-lead"><?php the_excerpt(); ?></p>
<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
</section>