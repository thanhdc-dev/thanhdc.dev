<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
?>
<div <?php wc_product_class('col-3', $product); ?>>
	<div class="product-inner">
		<div class="product-thumb">
			<div class="thumb-inner">
				<?php $link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product ); ?>
				<a class="thumb-link" href="<?php echo esc_url( $link )?>">
					<?php echo woocommerce_get_product_thumbnail();?>
				</a>
			</div>
			<div class="group-button-mobile">
				<a href="#" class="add-cart">Thêm vào giỏ</a>
				<a href="#" class="compare">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a href="#" class="add_wishlist">
					<i class="far fa-heart"></i>
				</a>
			</div>
		</div>
		<div class="product-info">
			<!-- <div class="star-rating">
				<span class="star" style="width: 80%"></span>
			</div>
			<?php woocommerce_template_loop_rating() ?> -->
			<div class="product-name">
				<a href=""><?php echo get_the_title();?></a>
			</div>
			<div class="product-price">
				<?php woocommerce_template_loop_price() ?>
			</div>
			<div class="group-button">
				<div class="inner">
					<?php woocommerce_template_loop_add_to_cart(['class' => 'add-cart']) ?>
					<a href="#" class="compare">
						<i class="fas fa-exchange-alt"></i>
					</a>
					<a href="#" class="add_wishlist">
						<i class="far fa-heart"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>