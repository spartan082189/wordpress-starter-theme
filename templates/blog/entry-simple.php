<article class="uk-article uk-margin-bottom the-post">
  <div>
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'uk-responsive-width', 'title' => 'Feature image']); ?>
  </div>
  <div class="uk-padding">
    <h2 class="uk-article-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="uk-link"><?php the_title(); ?></a>
    </h2>
    <p class="uk-article-meta">Written by <a href="<?php the_author_link(); ?>"><?php the_author(); ?></a> on <?php the_date(); ?>.</p>
    <?php get_template_part('/templates/blog/entry-summary'); ?>
    <a class="uk-button uk-button-text uk-margin" href="<?php the_permalink(); ?>" title="<?php the_title();?>">READ MORE...</a>
    <?php get_template_part('templates/blog/entry-footer'); ?>
  </div>
</article>