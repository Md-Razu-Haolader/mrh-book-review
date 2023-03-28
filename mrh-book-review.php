<?php

declare( strict_types=1 );
/**
 * Plugin Name:       Book Review
 * Plugin URI:        razu.cse129@gmail.com
 * Description:       A plugin to a custom post type and handles all the functionality related to that.
 * Version:           1.0.0
 * Requires at least: 6.1
 * Requires PHP:      8.2
 * Author:            Md. Razu Haolader
 * Author URI:        https://www.linkedin.com/in/md-razu-haolader/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       book-review.
 *
 * Copyright (c) 2023 Md. Razu Haolader (razu.cse129@gmail.com). All rights reserved.
 *
 * This program is a free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see the License URI.
 */
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__.'/vendor/autoload.php';

use MRH\BookReview\BookReview;

define( 'MRHBR_FILE', __FILE__ );
define( 'MRHBR_PATH', __DIR__ );
/**
 * Initializes the main plugin.
 */
function book_review(): BookReview
{
    return BookReview::instance();
}

// kick off the plugin
book_review();
