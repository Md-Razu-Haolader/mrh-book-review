<?php
wp_nonce_field(basename(__FILE__), 'book_publications_field');

?>

<label for="mrhbr_book_publisher"><?php _e('Book Publications', MRHBR_DOMAIN); ?></label>
<input type="text" name="mrhbr_book_publisher" id="mrhbr_book_publisher" class="postbox" value="<?php echo $publisher; ?>">
<label for="mrhbr_book_publish_date"><?php _e('Book Publish Date', MRHBR_DOMAIN); ?></label>
<input type="date" name="mrhbr_book_publish_date" id="mrhbr_book_publish_date" class="postbox" value="<?php echo $publish_date; ?>">
