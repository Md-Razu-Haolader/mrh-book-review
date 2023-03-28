<?php

declare( strict_types=1 );

namespace MRH\BookReview\Custom\PostTypes;

class Book
{
    public function __construct()
    {
        add_action( 'init', [$this, 'add_post_type'] );
        add_filter( 'post_updated_messages', [$this, 'override_post_updated_messages'] );
    }

    /**
     * Adds a custom post type.
     */
    public function add_post_type(): void
    {
        $labels = [
            'name' => _x( 'Books', 'General name of post type', MRHBR_DOMAIN ),
            'singular_name' => _x( 'Book', 'Singular name of post type', MRHBR_DOMAIN ),
            'menu_name' => _x( 'Books', 'Admin Menu text', MRHBR_DOMAIN ),
            'name_admin_bar' => _x( 'Book', 'Add New on Toolbar', MRHBR_DOMAIN ),
            'add_new' => __( 'Add New', MRHBR_DOMAIN ),
            'add_new_item' => __( 'Add New Book', MRHBR_DOMAIN ),
            'new_item' => __( 'New Book', MRHBR_DOMAIN ),
            'edit_item' => __( 'Edit Book', MRHBR_DOMAIN ),
            'view_item' => __( 'View Book', MRHBR_DOMAIN ),
            'all_items' => __( 'All Books', MRHBR_DOMAIN ),
            'search_items' => __( 'Search Books', MRHBR_DOMAIN ),
            'parent_item_colon' => __( 'Parent Books: ', MRHBR_DOMAIN ),
            'not_found' => __( 'No books found.', MRHBR_DOMAIN ),
            'not_found_in_trash' => __( 'No books found in Trash.', MRHBR_DOMAIN ),
            'featured_image' => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type.', MRHBR_DOMAIN ),
            'set_featured_image' => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type.', MRHBR_DOMAIN ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type.', MRHBR_DOMAIN ),
            'use_featured_image' => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type.', MRHBR_DOMAIN ),
            'archives' => _x( 'Book archives', 'The post type archive label used in nav menus.', MRHBR_DOMAIN ),
            'insert_into_item' => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post).', MRHBR_DOMAIN ),
            'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post).', MRHBR_DOMAIN ),
            'filter_items_list' => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen.', MRHBR_DOMAIN ),
            'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen.', MRHBR_DOMAIN ),
            'items_list' => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen.', MRHBR_DOMAIN ),
        ];

        $args = [
            'labels' => $labels,
            'description' => __( 'Holds our books and book specific data', MRHBR_DOMAIN ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => ['slug' => MRHBR_POST_TYPE],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-book-alt',
            'supports' => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
        ];

        register_post_type( MRHBR_POST_TYPE, $args );
    }

    /**
     * Override custom post updated messages.
     */
    public function override_post_updated_messages( array|string $messages ): array|string
    {
        $post = get_post();
        $post_type = get_post_type( $post );
        $post_type_object = get_post_type_object( $post_type );

        $messages[MRHBR_POST_TYPE] = [
            0 => '',
            1 => __( 'Book updated.', MRHBR_DOMAIN ),
            2 => __( 'Custom field updated.', MRHBR_DOMAIN ),
            3 => __( 'Custom field deleted.', MRHBR_DOMAIN ),
            4 => __( 'Book updated.', MRHBR_DOMAIN ),
            5 => isset( $_GET['revision'] ) ? sprintf( __( 'Book restored to revision from %s', MRHBR_DOMAIN ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6 => __( 'Book published.', MRHBR_DOMAIN ),
            7 => __( 'Book saved.', MRHBR_DOMAIN ),
            8 => __( 'Book submitted.', MRHBR_DOMAIN ),
            9 => sprintf(
                __( 'Book scheduled for: <strong>%1$s</strong>.', MRHBR_DOMAIN ),
                date_i18n( __( 'M j, Y @ G:i', MRHBR_DOMAIN ), strtotime( $post->post_date ) )
            ),
            10 => __( 'Book draft updated.', MRHBR_DOMAIN ),
        ];

        if ( $post_type_object->publicly_queryable && MRHBR_POST_TYPE === $post_type ) {
            $permalink = get_permalink( $post->ID );
            $view_link = sprintf(
                ' <a href="%s">%s</a>',
                esc_url( $permalink ),
                __( 'View book', MRHBR_DOMAIN )
            );

            $messages[$post_type][1] .= $view_link;
            $messages[$post_type][6] .= $view_link;
            $messages[$post_type][9] .= $view_link;

            $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
            $preview_link = sprintf(
                ' <a target = "_blank" href = "%s">%s</a>',
                esc_url( $preview_permalink ),
                __( 'Preview book', MRHBR_DOMAIN )
            );

            $messages[$post_type][8] .= $preview_link;
            $messages[$post_type][10] .= $preview_link;
        }

        return $messages;
    }
}
