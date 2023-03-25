<?php

declare(strict_types=1);

namespace MRH\BookReview\Admin;

class TaxonomyRegister
{

    public function __construct()
    {
        new Taxonomies\Genre();
    }
}
