<?php
/**
 * Functions for NJSL Databases
 */

// Don't use the single database template included with the plugin
add_filter( 'njsl_database_override_single_template', '__return_false' );