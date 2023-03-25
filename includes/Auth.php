<?php

declare(strict_types=1);

namespace MRH\BookReview;

/**
 * Auth handler class
 */
class Auth
{


    public function __construct()
    {
        $this->init_classes();
    }

    private function init_classes(): void
    {
        if ($this->has_user_edit_permission()) {
            new Admin\MetaBoxHandler();
            new Admin\TaxonomyRegister();
        }
    }

    private function has_user_edit_permission(): bool
    {
        return is_user_logged_in() && current_user_can('edit_posts');
    }
}
