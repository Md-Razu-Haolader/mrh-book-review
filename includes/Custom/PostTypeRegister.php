<?php

declare(strict_types=1);

namespace MRH\BookReview\Custom;


class PostTypeRegister
{

    public function __construct()
    {
        new PostTypes\Book();
    }
}
