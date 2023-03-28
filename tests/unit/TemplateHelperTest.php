<?php

declare( strict_types=1 );

namespace MRH\BookReview\Tests;

use MRH\BookReview\Helpers\Template as TemplateHelper;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;

class TemplateHelperTest extends TestCase
{
    private static $template_helper;

    public static function set_up_before_class(): void
    {
        static::$template_helper = new TemplateHelper();
    }

    public function testShouldRenderTemplateWhenValidPathGiven()
    {
        $this->expectNotToPerformAssertions();
        ob_start();
        $file_path = MRHBR_INCLUDES.'/Frontend/templates/archive-book.php';
        static::$template_helper->render( $file_path );
        ob_get_clean();
    }

    public function testShouldThrowErrorWhenInvalidPathGiven()
    {
        $this->expectException( \RuntimeException::class );
        $file_path = MRHBR_INCLUDES.'/Frontend/templates/test.php';
        static::$template_helper->render( $file_path );
    }
}
