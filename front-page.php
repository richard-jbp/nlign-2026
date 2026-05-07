<?php
/**
 * Homepage template.
 *
 * Each section is a thin partial that pulls its ACF data through helpers.
 * Adding / removing sections is a one-line change here — no logic in this file.
 *
 * @package NLign_2026
 */

declare( strict_types=1 );

get_header();

// Order is the order of the page; reordering changes the page.
nlign_section( 'hero' );
nlign_section( 'reality' );
nlign_section( 'solution' );
nlign_section( 'trusted-by' );
nlign_section( 'impact' );
nlign_section( 'cta-bar' );

get_footer();
