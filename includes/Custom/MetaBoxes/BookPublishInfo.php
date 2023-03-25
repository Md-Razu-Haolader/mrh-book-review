<?php

declare(strict_types=1);

namespace MRH\BookReview\Custom\MetaBoxes;

use MRH\BookReview\Helpers\Template;

class BookPublishInfo
{

    public function __construct()
    {
        add_action('add_meta_boxes', [$this, 'add_meta_box']);
        add_action('save_post', [$this, 'save'], null, 2);
    }

    /**
     * Adds custom meta box
     *
     * @return void
     */
    public function add_meta_box(): void
    {
        add_meta_box(
            'mrhbr_publications_info',
            __('Book Publications Info', MRHBR_DOMAIN),
            [$this, 'render'],
            MRHBR_POST_TYPE,
            'side',
        );
    }

    /**
     * Saves the meta box value in the database
     *
     * @param integer $post_id
     * @param object $post
     * @return void
     */
    public function save(int $post_id, object $post): void
    {
        if ($this->is_saveable($post_id, $post->post_type)) {
            if ($this->is_valid_nonce() && isset($_POST['mrhbr_book_publisher']) && !empty($_POST['mrhbr_book_publisher'])) {

                update_post_meta(
                    $post_id,
                    'mrhbr_book_publisher',
                    esc_html($_POST['mrhbr_book_publisher'])
                );
            }

            if ($this->is_valid_nonce() && isset($_POST['mrhbr_book_publish_date']) && !empty($_POST['mrhbr_book_publish_date'])) {
                update_post_meta(
                    $post_id,
                    'mrhbr_book_publish_date',
                    $_POST['mrhbr_book_publish_date']
                );
            }
        }
    }

    private function is_saveable(int $post_id, string $post_type): bool
    {
        return current_user_can('edit_post', $post_id) &&  $post_type !== 'revision';
    }

    private function is_valid_nonce(): bool
    {
        return wp_verify_nonce($_POST['book_publications_field'], 'book-pub-info-meta-form.php') !== false;
    }

    /**
     * Renders the HTML for book publications
     *
     * @param object $post
     * 
     * @return void
     */
    public function render(object $post): void
    {
        Template::render(
            MRHBR_INCLUDES . '/Custom/views/book-pub-info-meta-form.php',
            [
                'publisher' => get_post_meta($post->ID, 'mrhbr_book_publisher', true),
                'publish_date' => get_post_meta($post->ID, 'mrhbr_book_publish_date', true)
            ]
        );
    }
}
