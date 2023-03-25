<?php

declare(strict_types=1);

namespace MRH\BookReview\Frontend;

use MRH\BookReview\Helpers\Template as TemplateHelper;

/**
 * Template handler class
 */
class Template
{

    private $template_location = __DIR__ . '/templates';

    /**
     * Class constructor
     */
    public function __construct()
    {
        add_filter('template_include', [$this, 'book_template']);
    }

    /**
     * Includes the template files
     *
     * @param string $template
     * 
     * @return string
     */
    public function book_template(string $template): string
    {
        if (is_page('book')) {
            TemplateHelper::render($this->template_location . '/archive-book.php');
        }

        if (is_singular('book')) {
            TemplateHelper::render($this->template_location . '/single-book.php');
        }

        return $template;
    }
}
