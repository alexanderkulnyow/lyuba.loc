<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package uni_italy
 */

get_header();
?>

	<main id="primary" class="site-main container " style="height: 70vh">
        <style>
            .h1404 {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>
        <a href="/" class="h1404">Кажется вы потерялись</a>



	</main><!-- #main -->

<?php
get_footer();
