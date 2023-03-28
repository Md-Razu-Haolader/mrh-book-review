<?php

declare( strict_types=1 );

namespace MRH\BookReview;

/**
 * Plugin activator class.
 */
class Activator {

    /**
     * Runs the activator.
     *
     * @return void
     */
    public function run() {
        $this->add_plugin_info();
    }

    /**
     * Adds plugin info.
     */
    public function add_plugin_info(): void {
        $activated = get_option( 'mrhbr_installation_time' );

        if ( !$activated ) {
            update_option( 'mrhbr_installation_time', time() );
        }

        update_option( 'mrhbr_version', MRHBR_VERSION );
    }
}
