<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package uni_italy
 */
if ( is_singular() ) {
	get_template_part( 'template-parts/post/blog-content' );
} else {
	get_template_part( 'template-parts/post/blog-single-item' );
}


