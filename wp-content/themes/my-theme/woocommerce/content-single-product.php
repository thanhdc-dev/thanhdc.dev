<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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


if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div class="row">
	<div class="col-12">
		<?php woocommerce_output_all_notices(); ?>
	</div>
</div>
<div class="row product-info">
	<div class="col-12">
		<div class="product-title">
			<div class="left">
				<div class="product-name">
					iPhone Xs Max 512GB
				</div>

				<!-- <div class="star-rating">
              <span class="star" style="width: 80%"></span>
            </div> -->
				<a href="#">424 đánh giá</a>
			</div>
			<div class="fb-plugin">
				<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row single-product">
	<div class="col-12 col-md-5 col-lg-5 product-image">
		<div class="xzoom-container">
			<?php
			$post_thumbnail_id = $product->get_image_id();
			$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
			$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
			$thumbnail_src     = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
			?>
			<img class="xzoom3" id="xzoom-magnific" src="<?php echo current($thumbnail_src)?>" xoriginal="<?php echo current($thumbnail_src)?>" />
			<div class="xzoom-thumbs">
				<a href="<?php echo current($thumbnail_src)?>">
					<img class="xzoom-gallery3" src="<?php echo current($thumbnail_src)?>" xpreview="<?php echo current($thumbnail_src)?>" title="The description goes here">
				</a>
				<a href="https://picsum.photos/500/500/?random">
					<img class="xzoom-gallery3" src="https://picsum.photos/500/500/?random" title="The description goes here">
				</a>
				<button type="button" class="btn-viewall" data-toggle="modal" data-target="#viewall">
					<img class="img-viewall" src="<?php echo current($thumbnail_src)?>">
					<div class="img-count">
						Xem <br> 9 hình
					</div>
				</button>
				<div class="modal fade" id="viewall">
					<div class="modal-dialog modal-lg modal-dialog-centered">
						<div class="modal-content">
							<!-- Modal body -->
							<!--Carousel Wrapper-->
							<div class="fotorama" data-max-width="100%" data-nav="thumbs">>

								<img src="<?php echo current($thumbnail_src)?>">
								<img src="https://picsum.photos/600/600/?random">
							</div>

							<!--/.Carousel Wrapper-->
						</div>
					</div>
					<style>
						.fotorama__arr__arr {
							background: url('images/fotorama.png') no-repeat;
						}
					</style>
				</div>

			</div>
		</div>
	</div>
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class('row', $product); ?>>
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action('woocommerce_before_single_product_summary');
		?>

		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action('woocommerce_single_product_summary');
			?>
		</div>

		<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action('woocommerce_after_single_product_summary');
		?>
	</div>