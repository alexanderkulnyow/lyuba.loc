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
                <p>Есть вопросы? СВяжитесь со мной!</p>

                <div class="contact-page__icons">
                    <div class="contact-page__icons-wrapper">
                        <span class="dashicons dashicons-email-alt"></span><a class="text-muted" href="#">lyuba@lyuba.by</a>
                    </div>
                    <div class="contact-page__icons-wrapper">
                        <span class="dashicons dashicons-phone"></span><a class="text-muted" href="#">+375252555</a>
                    </div>
                    <a href="https://instagram.com/uni_lyuba"><span class="dashicons dashicons-instagram"></span></a>
                    <a href=""><span class="dashicons dashicons-whatsapp"></span></a>
                </div>


            </div>
            <div class="col-12 col-md-8">
                <p>Или заполните форму.</p>
		        <?php
		        echo do_shortcode( '[contact-form-7 id="2510" title="Контакты"]' ) ?>
            </div>


        </div>
    </main>
<?php
get_footer();
