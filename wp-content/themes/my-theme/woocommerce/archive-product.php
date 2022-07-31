<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<?php woocommerce_output_all_notices(); ?>
		</div>
	</div>
</div>
<div class="container section">
	<div class="row">
		<div class="col-12">
			<div class="section__head">
				<div class="title">
					Điện thoại nổi bật
				</div>
				<ul class="navigat">
					<li class="active"><a href="#">All</a></li>
					<?php
					$args = array('type' => 'product', 'taxonomy' => 'product_cat', 'parent' => 0, 'number' => 5);
					$categories = get_categories( $args );
					foreach ( $categories as $index => $category ): ?>
						<li><a href="<?php echo get_term_link($category->slug, 'product_cat'); ?>"><?php echo $category->name?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php 
		if ( woocommerce_product_loop() ) {

			woocommerce_product_loop_start();
		
			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();
		
					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action( 'woocommerce_shop_loop' );
		
					wc_get_template_part( 'content', 'product' );
				}
			}
		
			woocommerce_product_loop_end();
		
			woocommerce_pagination();
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}
	?>
</div>

<?php
get_footer( 'shop' );
