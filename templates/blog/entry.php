<article class="uk-padding uk-article uk-margin-bottom the-post">
    <h2 class="uk-article-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="uk-link-reset"><?php the_title(); ?></a>
    </h2>
    <p class="uk-article-meta">Written by <a href="#"><?php the_author(); ?></a> on 12 April 2012. Posted in <a href="#">Blog</a></p>
    <?php get_template_part('/templates/blog/entry-summary'); ?>
    <a class="uk-button uk-button-text uk-margin" href="<?php the_permalink(); ?>" title="<?php the_title();?>">READ MORE</a>
    <?php get_template_part('templates/blog/entry-footer'); ?>
</article>
