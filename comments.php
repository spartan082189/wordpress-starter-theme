<?php 
    $fields = array( 
        'author'=> '
            <p class="comment-form-author">
                <input class="uk-input" name="author" type="text" placeholder="Name" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30" ' . $aria_req . ' />
            </p>', 
        'email' => '
            <p class="comment-form-email">
             <input class="uk-input" name="email" type="text" placeholder="Email" value="' . esc_attr(  $commenter['comment_author_email'] ) .'" size="30" ' . $aria_req . ' />
            </p>' 
        ); 

    $args = array( 
        'form' => array( 'class' => 'form-horizontal' ), 
        'fields' => apply_filters('comment_form_default_fields', $fields), 
        'comment_field' => '<textarea class="uk-textarea" placeholder="Comment" name="comment" rows="3" aria-required="true"></textarea>', 
        'comment_notes_after' => '', 
        'class_submit' => 'uk-button uk-button-primary' 
        ); 
?>

<?php if ( 'comments.php'== basename( $_SERVER[ 'SCRIPT_FILENAME'] ) ) return; ?>
<section class="uk-container uk-container-large">
  <div>
    <?php if ( have_comments() ) : global $comments_by_type; $comments_by_type=& separate_comments( $comments ); if ( ! empty( $comments_by_type[ 'comment'] ) ) : ?>
    <section id="comments-list">
      <h3 class="comments-count">
        <?php comments_number(); ?>
      </h3>
      <ul class="uk-list list-comments">
        <?php wp_list_comments( 'type=comment' ); ?>
      </ul>
      <?php if ( get_comment_pages_count()> 1 ) : ?>
      <nav class="comments-navigation" role="navigation">
        <div class="comments-links">
          <?php paginate_comments_links(); ?>
        </div>
      </nav>
      <?php endif; ?>
    </section>
    <?php endif; ?>
    <?php endif; if ( comments_open() ) comment_form($args); ?>
  </div>
</section>