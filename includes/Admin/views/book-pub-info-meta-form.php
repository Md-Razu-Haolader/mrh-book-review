<?php
wp_nonce_field(basename(__FILE__), 'book_publications_field');

?>

<label for="mrhbr-book-publisher"><?php _e('Book Publications', MRHBR_DOMAIN); ?></label>
<input type="text" name="mrhbr-book-publisher" id="mrhbr-book-publisher" class="postbox" value="<?php echo $publisher; ?>">
<label for="mrhbr-book-publish-date"><?php _e('Book Publish Date', MRHBR_DOMAIN); ?></label>
<input type="date" name="mrhbr-book-publish-date" id="mrhbr-book-publish-date" class="postbox" value="<?php echo $publish_date; ?>">
