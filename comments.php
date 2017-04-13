<?php $fields= array( 'author'=> '
<p class="comment-form-author">
  <label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '
  <input id="author" class="uk-input" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30" ' . $aria_req . ' />
</p>', 'email' => '
<p class="comment-form-email">
  <label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '
  <input id="email" class="uk-input" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30" ' . $aria_req . ' />
</p>' ); $args = array( 'form' => array( 'class' => 'form-horizontal' ), 'fields' => apply_filters('comment_form_default_fields', $fields), 'comment_field' => '
<div class="form-group">' . '
  <label for="comment">' . __( 'Comment', 'wp_babobski' ) . '</label><span>*</span>' . '
  <textarea id="comment" class="uk-textarea" name="comment" rows="3" aria-required="true"></textarea>
  <p id="d3" class="text-danger"></p>' . '</div>', 'comment_notes_after' => '', 'class_submit' => 'uk-button uk-button-primary' ); ?>

<?php if ( 'comments.php'== basename( $_SERVER[ 'SCRIPT_FILENAME'] ) ) return; ?>
<section class="uk-container uk-container-large">
  <div>
    <?php if ( have_comments() ) : global $comments_by_type; $comments_by_type=& separate_comments( $comments ); if ( ! empty( $comments_by_type[ 'comment'] ) ) : ?>
    <section id="comments-list" class="comments">
        <h3 class="comments-title"><?php comments_number(); ?></h3>
        <?php if ( get_comment_pages_count()> 1 ) : ?>
        <nav id="comments-nav-above" class="comments-navigation" role="navigation">
        <div class="paginated-comments-links">
            <?php paginate_comments_links(); ?>
        </div>
        </nav>
        <?php endif; ?>
        <ul>
        <?php wp_list_comments( 'type=comment' ); ?>
        </ul>
        <?php if ( get_comment_pages_count()> 1 ) : ?>
        <nav id="comments-nav-below" class="comments-navigation" role="navigation">
        <div class="paginated-comments-links">
            <?php paginate_comments_links(); ?>
        </div>
        </nav>
        <?php endif; ?>
    </section>
    <?php endif; if ( ! empty( $comments_by_type[ 'pings'] ) ) : $ping_count= count( $comments_by_type[ 'pings'] ); ?>
    <section id="trackbacks-list" class="comments">
        <h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'blankslate' ) : __( 'Trackback', 'blankslate' ) ); ?></h3>
        <ul>
        <?php wp_list_comments( 'type=pings&callback=blankslate_custom_pings' ); ?>
        </ul>
    </section>
    <?php endif; endif; if ( comments_open() ) comment_form($args); ?>
  </div>
</section>