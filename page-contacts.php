<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package uni_italy
 */

get_header();
?>
    <main class="container">

        <div class="row">
            <h1>Контакты</h1>


        </div>
        <div class="row">
            <div class="col-12 col-md-4">
                <p>Есть вопросы? Свяжитесь со мной!</p>

                <div class="contact-page__icons">
                    <div class="contact-page__icons-wrapper">
                        <span class="dashicons dashicons-email-alt"></span><a class="text-muted"
                                                                              href="mailto:<?php echo nl2br( esc_html( get_theme_mod( 'lyuba__email-set' ) ) ) ?>"><?php echo nl2br( esc_html( get_theme_mod( 'lyuba__email-set' ) ) ) ?></a>
                    </div>
                    <div class="contact-page__icons-wrapper">
                        <span class="dashicons dashicons-phone"></span><a class="text-muted"
                                                                          href="tel:<?php echo nl2br( esc_html( get_theme_mod( 'lyuba__tel-set' ) ) ) ?>"><?php echo nl2br( esc_html( get_theme_mod( 'lyuba__tel-set' ) ) ) ?></a>
                    </div>
                    <a href="<?php echo nl2br( esc_html( get_theme_mod( 'lyuba__inst-set' ) ) ) ?>"><span
                                class="dashicons dashicons-instagram"></span></a>
                    <a href="https://wa.me/<?php echo nl2br( esc_html( get_theme_mod( 'lyuba__tel-set' ) ) ) ?>"><span
                                class="dashicons dashicons-whatsapp"></span></a>
                </div>


            </div>
            <div class="col-12 col-md-5">
                <p>Или заполните форму.</p>
				<?php
				echo do_shortcode( '[contact-form-7 id="2510" title="Контакты"]' ) ?>
            </div>
            <aside class="col-12 col-md-3">
				<?php get_sidebar(); ?>
            </aside>


        </div>
    </main>
<?php
get_footer();
