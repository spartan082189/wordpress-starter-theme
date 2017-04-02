<footer class="uk-clearfix the-post-footer">
  <div class="uk-float-right"><a href="<?php echo get_comments_link() ?>"><?php echo comments_number() ?></a></div>
  <div class="uk-float-left the-post-cats">
    <?php 
      $categories = get_the_category(); 
      foreach ($categories as $category) {
        echo '<a class="uk-label uk-display-inline-block" href="' . get_category_link($category->term_id) . '">' . $category->cat_name . '</a>';
      }
    ?>
    </div>
</footer> 