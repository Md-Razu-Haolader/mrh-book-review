<?php

declare( strict_types=1 );

namespace MRH\BookReview;

final class BookReview
{
    private static $instance;

    public const version = '1.0.0';
    public const domain = 'mrh-book-review';
    public const post_type = 'book';
    public const taxonomy = 'genre';

    /**
     * Private class constructor.
     */
    private function __construct()
    {
        $this->define_constants();
        $this->init_hooks();
    }

    /**
     * Private class cloner.
     */
    private function __clone()
    {
    }

    public static function instance(): BookReview
    {
        if ( !isset( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Defines the required constants.
     */
    public function define_constants(): void
    {
        define( 'MRHBR_VERSION', self::version );
        define( 'MRHBR_URL', plugins_url( '', MRHBR_FILE ) );
        define( 'MRHBR_ASSETS', MRHBR_URL.'/assets' );
        define( 'MRHBR_INCLUDES', MRHBR_PATH.'/includes' );
        define( 'MRHBR_DOMAIN', self::domain );
        define( 'MRHBR_POST_TYPE', self::post_type );
        define( 'MRHBR_TAXONOMY', self::taxonomy );
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks(): void
    {
        register_activation_hook( __FILE__, [$this, 'activate'] );
        add_action( 'plugins_loaded', [$this, 'init_classes'] );
    }

    /**
     * Updates info on plugin activation.
     */
    public function activate(): void
    {
        $activator = new Activator();
        $activator->run();
    }

    /**
     * Initializes the necessary classes for the plugin.
     */
    public function init_classes(): void
    {
        new Frontend();
        new Custom();
    }
}
