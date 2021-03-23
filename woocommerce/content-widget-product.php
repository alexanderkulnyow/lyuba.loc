<?php
/**
 * The template for displaying product widget entries.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-widget-product.php.
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! is_a( $product, 'WC_Product' ) ) {
	return;
}
?>
<li class="lyuba__widget-product border mb-5 p-2">
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
    <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
		<?php echo $product->get_image( 'medium' ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        <p class="text-center"><?php echo wp_kses_post( $product->get_name() ); ?></p>
    </a>

	<?php if ( ! empty( $show_rating ) ) : ?>
        <span class="text-center">
			<?php echo wc_get_rating_html( $product->get_average_rating() ); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        </span>
	<?php endif; ?>

    <div class="text-right m">
		<?php echo $product->get_price_html(); // PHPCS:Ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
    </div>

    <div class="d-flex justify-content-end pt-2">
        <a href="<?php echo get_the_permalink(); ?>" style="color: #55abf4;">Подробнее</a>
    </div>


	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
