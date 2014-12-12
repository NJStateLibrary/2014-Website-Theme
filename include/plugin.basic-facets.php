<?php

/**
 * Functions for Basic Facets
 */

/**
 * Use custom friendly post type names in facets
 */
add_filter( 'basic_facets_friendly_post_type_name', 'njsl_get_friendly_post_type' );
