<?php

declare( strict_types=1 );

namespace MRH\BookReview;

/**
 * Frontend handler class.
 */
class Frontend
{
    /**
     * Frontend class constructor.
     */
    public function __construct()
    {
        new Frontend\Template();
    }
}
