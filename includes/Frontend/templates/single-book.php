  <?php
	/**
	 * The template for displaying single book
	 * 
	 * @package JWP_Book_Review
	 * @subpackage Single Book Template
	 * @version 1.0
	 */

	get_header();
	?>
  <div class="wrap">
  	<div id="primary" class="content-area">
  		<main id="main" class="site-main" role="main">
  			<?php

				if (have_posts()) :
					the_post();
					$post_id = get_the_ID();
					get_template_part('template-parts/content/content', get_post_format());
					$book_publisher = get_post_meta($post_id, 'mrhbr-book-publisher', true);
					$book_published_date = get_post_meta($post_id, 'mrhbr-book-publish-date', true);
				?>
  				<div class="has-text-align-center">
  					<p>Book Publications: <?php echo $book_publisher; ?></p>
  					<p>Book Published Date: <?php echo $book_published_date; ?></p>
  				</div>
  			<?php

					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				endif;

				?>
  		</main>
  	</div>
  </div>
  <?php
	get_footer();
