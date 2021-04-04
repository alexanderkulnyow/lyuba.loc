<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package uni_italy
 */

//woocommerce modify hooks
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_action( 'after_setup_theme', 'uni_italy_woocommerce_setup' );
add_action( 'wp_enqueue_scripts', 'uni_italy_woocommerce_scripts' );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'body_class', 'uni_italy_woocommerce_active_body_class' );
add_filter( 'woocommerce_output_related_products_args', 'uni_italy_woocommerce_related_products_args' );
add_filter( 'woocommerce_add_to_cart_fragments', 'uni_italy_woocommerce_cart_link_fragment' );
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );


function wcc_change_breadcrumb_home_text( $defaults ) {
	// Change the breadcrumb home text from 'Home' to 'Apartment'
	$defaults['wrap_before'] = '<div class="col-12">';
	$defaults['wrap_after']  = '</div>';

	return $defaults;
}


/**
 * Remove default WooCommerce wrapper.
 */

/**
 * modify default WooCommerce wrapper.
 */

add_action( 'woocommerce_before_main_content', 'uni_italy_woocommerce_wrapper_before' );
add_action( 'woocommerce_after_main_content', 'uni_italy_woocommerce_wrapper_after' );
/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function uni_italy_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
//	add_theme_support( 'wc-product-gallery-zoom' );
//	add_theme_support( 'wc-product-gallery-lightbox' );
//	add_theme_support( 'wc-product-gallery-slider' );
}


/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function uni_italy_woocommerce_scripts() {
	wp_enqueue_style( 'uni_italy-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'uni_italy-woocommerce-style', $inline_font );
}


/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */


/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 *
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function uni_italy_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}


/**
 * Related Products Args.
 *
 * @param array $args related products args.
 *
 * @return array $args related products args.
 */
function uni_italy_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}


if ( ! function_exists( 'uni_italy_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function uni_italy_woocommerce_wrapper_before() {

		echo '<div id="primary" class="content-area container"><main class="site-main row" role="main">';


	}
}

if ( ! function_exists( 'uni_italy_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function uni_italy_woocommerce_wrapper_after() {
		?>
        </main></div><!-- #main -->
		<?php
	}
}

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'uni_italy_woocommerce_header_cart' ) ) {
 * uni_italy_woocommerce_header_cart();
 * }
 * ?>
 */

if ( ! function_exists( 'uni_italy_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 *
	 * @return array Fragments to refresh via AJAX.
	 */
	function uni_italy_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		uni_italy_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}


if ( ! function_exists( 'uni_italy_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function uni_italy_woocommerce_cart_link() {
		?>
        <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>"
           title="<?php esc_attr_e( 'View your shopping cart', 'uni_italy' ); ?>">
			<?php
			$item_count_text = sprintf(
			/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'uni_italy' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
            <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span
                    class="count"><?php echo esc_html( $item_count_text ); ?></span>
        </a>
		<?php
	}
}

if ( ! function_exists( 'uni_italy_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function uni_italy_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr( $class ); ?>">
				<?php uni_italy_woocommerce_cart_link(); ?>
            </li>
            <li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
            </li>
        </ul>
		<?php
	}
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'uni_italy_single_product_registration', 90 );
function uni_italy_single_product_registration() {
	?>
    <div class="d-flex justify-content-end mb-5">
        <button type="button" class="btn btn btn-services" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Заказать</button>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content " style="z-index: 99999999999 !important;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Заказать <?php echo esc_html( get_the_title() );?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="2533" title="Заказ услуги"]')?>

                </div>
            </div>
        </div>
    </div>
	<?php
}

add_filter( 'woocommerce_page_title', 'theme_shop_page_title');
function theme_shop_page_title( $page_title ) {
	if( 'Товары' == $page_title) { // Заголовок который нужно изменить или убрать
		return ""; // Здесь может быть заголовок главной страницы магазина
	}
}

//function woocommerce_output_content_wrapper_1(){
//	echo '<div id="primary" class="content-area container"><main class="site-main row" role="main">';
//}
//remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
//add_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper_1', 10);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_filter( "woocommerce_before_widget_product_list", "edit_product_widget_list", 1, 1 );

//$old_html contains -> <ul class="product_list_widget">
function edit_product_widget_list ( $old_html ) {
	return '<ul class="product_list_widget row">'; // change your class here
}



// not purchasable
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );
remove_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_arena_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_simple_add_to_cart', 30 );


// not purchasable end
