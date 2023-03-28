<?php declare( strict_types=1 );

/**
 * The template for displaying book archive.
 *
 * @version 1.0
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php if ( have_posts() ) { ?>

            <header class="page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
            ?>
            </header><!-- .page-header -->

        <?php

            while ( have_posts() ) {
                the_post();

                get_template_part( 'template-parts/content/content', 'excerpt' );
            }

            the_post_navigation(
                [
                    'prev_text' => '<span class="screen-reader-text">Previous</span><span aria-hidden="true" class="nav-subtitle">Previous</span> <span class="nav-title"><span class="nav-title-icon-wrapper"><span class="dashicons dashicons-arrow-left-alt"></span></span>%title</span>',
                    'next_text' => '<span class="screen-reader-text">Next</span><span aria-hidden="true" class="nav-subtitle">Next</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"><span class="dashicons dashicons-arrow-left-alt"></span></span></span>',
                ]
            );
        } else {
            get_template_part( 'template-parts/content/content', 'none' );
        }
?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
