<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uni_italy
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info container">
            <div class="row">
                <div class="col-12 col-sm-6 order-0 col-lg-4">
                    <div class="d-flex justify-content-start align-items-center">
		                <?php
		                the_custom_logo(); ?>
                        <h4 class="custom_logo_text ml-3">Поступление
                            <br>в италию</h4>
                    </div>
                </div>
                <div class="col-6 col-lg-3 order-1 order-sm-2 order-lg-1 no-logo">
                    <h5>Меню</h5>
	                <?php
	                wp_nav_menu(
		                array(
			                'theme_location' => 'menu-1',
			                'menu_id'        => 'primary-menu',
			                'menu_class'      => 'menu list-unstyled',
			                'menu_id'         => '',
			                'echo'            => true,
			                'fallback_cb'     => 'wp_page_menu',
			                'before'          => '',
			                'after'           => '',
			                'link_before'     => '',
			                'link_after'      => '',
			                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			                'depth'           => 0,
			                'walker'          => '',
		                )
	                );
	                ?>
                </div>
                <div class="col-6 col-lg-3 order-2 order-sm-3 order-lg-2 no-logo footer__contacts">
                    <h5>Контакты</h5>
                    <ul class="list-unstyled">
                        <li><span class="dashicons dashicons-phone"></span><a class="text-muted" href="#">+375252555</a></li>
                        <li><span class="dashicons dashicons-email-alt"></span><a class="text-muted" href="#">lyuba@lyuba.by</a></li>
                        <div class="footer__social ">
                            <a href="https://instagram.com/uni_lyuba"><span class="dashicons dashicons-instagram"></span></a>
                            <a href=""><span class="dashicons dashicons-whatsapp"></span></a>
                        </div>
                    </ul>
                </div>
                <div class="col-12 col-sm-6  col-lg-2 order-3 order-sm-1 order-lg-3 no-logo">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim…</p>
                </div>
            </div>

		</div><!-- .site-info -->
        <div class="container">
            <div class="dds">
                <p class="text-right mb-0">
                Designed by <a href="https:\\dds.by" target="_blank">DDS</a>
                </p>
            </div>
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
