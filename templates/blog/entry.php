<article class="uk-padding">
    <h2>
      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="teal-text text-lighten-2"><?php the_title(); ?></a>
    </h2>
    <?php
    if (is_archive() || is_search()) {
        get_template_part('/templates/blog/entry-summary');
    } else {
        // get_template_part('/templates/blog/entry-content');
        get_template_part('/templates/blog/entry-summary');
    }
    ?>
    <?php
    if (is_single()) {
        get_template_part('entry-footer', 'single');
    } else {
        get_template_part('templates/blog/entry-footer');
    }
    ?>
    <a class="waves-effect waves-light btn btn-large" href="<?php the_permalink(); ?>" title="<?php the_title();?>">Read full article...</a>
    <p><?php the_category(); ?></p>
</article>
