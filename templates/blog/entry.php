<article class="uk-padding uk-article">
    <h2 class="uk-article-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="uk-link-reset"><?php the_title(); ?></a>
    </h2>
    <p class="uk-article-meta">Written by <a href="#"><?php the_author(); ?></a> on 12 April 2012. Posted in <a href="#">Blog</a></p>
    <?php get_template_part('/templates/blog/entry-summary'); ?>
    <?php get_template_part('templates/blog/entry-footer'); ?>
    <a class="uk-button uk-button-text" href="<?php the_permalink(); ?>" title="<?php the_title();?>">Read more</a>
    <p>
    <?php 
        $categories = get_the_category(); 
        foreach ($categories as $category) {
         echo '<a class="uk-label uk-display-inline-block" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
        }
    ?>
    </p>
    <hr class="uk-divider-icon">
</article>
