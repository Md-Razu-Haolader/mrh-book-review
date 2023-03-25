<?php

declare(strict_types=1);

namespace MRH\BookReview\Admin\Taxonomies;

use MRH\BookReview\Admin\Interfaces\Taxonomy;

class Genre implements Taxonomy
{


    public function __construct()
    {
        add_action('init', [$this, 'add_taxonomy']);
    }

    /**
     * Adds custom taxonomy
     *
     * @return void
     */
    public function add_taxonomy(): void
    {

        $labels = [
            'name'              => _x('Genres', 'Taxonomy general name', MRHBR_DOMAIN),
            'singular_name'     => _x('Genre', 'Taxonomy singular_name', MRHBR_DOMAIN),
            'search_items'      => __('Search Genres', MRHBR_DOMAIN),
            'all_items'         => __('All Genres', MRHBR_DOMAIN),
            'parent_item'       => __('Parent Genre', MRHBR_DOMAIN),
            'parent_item_colon' => __('Parent Genre: ', MRHBR_DOMAIN),
            'edit_item'         => __('Edit Genre', MRHBR_DOMAIN),
            'update_item'       => __('Update Genre', MRHBR_DOMAIN),
            'add_new_item'      => __('Add New Genre', MRHBR_DOMAIN),
            'new_item_name'     => __('New Genre', MRHBR_DOMAIN),
            'menu_name'         => __('Genre', MRHBR_DOMAIN),
        ];

        $args = [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => MRHBR_TAXONOMY],
        ];

        register_taxonomy(MRHBR_TAXONOMY, MRHBR_POST_TYPE, $args);
    }
}
