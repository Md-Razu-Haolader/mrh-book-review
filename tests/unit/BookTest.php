<?php

declare( strict_types=1 );

namespace MRH\BookReview\Tests;

use MRH\BookReview\Custom\PostTypes\Book;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class BookTest extends TestCase {

    private static $book;

    public static function set_up_before_class(): void {
        static::$book = new Book();
    }

    public function test_should_add_book_post_type() {
        static::$book->add_post_type();
        $this->assertTrue( post_type_exists( MRHBR_POST_TYPE ) );
    }
}
