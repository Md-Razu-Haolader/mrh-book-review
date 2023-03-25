<?php

declare(strict_types=1);

namespace MRH\BookReview\Admin;

class MetaBoxHandler
{

    public function __construct()
    {
        new MetaBoxes\BookPublishInfo();
    }
}
