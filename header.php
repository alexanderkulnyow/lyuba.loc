<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package uni_italy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5M4GSLD');</script>
    <!-- End Google Tag Manager -->
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5M4GSLD"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site" style="overflow-x: hidden">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'uni_italy' ); ?></a>

	<header id="masthead" class=" container-fluid">
        <div class="container site-header d-flex justify-content-between">
            <div class="site-branding">
                <div class="d-flex justify-content-start align-items-center">
	                <?php
	                the_custom_logo(); ?>
                    <h1 class="custom_logo_text">Поступление
                        <br>в Италию</h1>
                </div>

            </div><!-- .site-branding -->
            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="dashicons dashicons-menu-alt3"></span>
                </button>
		        <?php
		        wp_nav_menu(
			        array(
				        'theme_location' => 'menu-1',
				        'menu_id'        => 'primary-menu',
			        )
		        );
		        ?>
            </nav><!-- #site-navigation -->
            <div class="header__social d-none d-md-flex">
                <a href="https://instagram.com/uni_lyuba"><span class="dashicons dashicons-instagram"></span></a>
                <a href=""><span class="dashicons dashicons-whatsapp"></span></a>
            </div>
        </div>

	</header><!-- #masthead -->


