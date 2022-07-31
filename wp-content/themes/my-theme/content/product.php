<?php global $product; ?>
<div class="product-item" <?php wc_product_class('', $product); ?>>
    <div class="product-inner">
        <div class="product-thumb">
            <div class="thumb-inner">
                <a class="thumb-link" href="<?php the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', array('class' => 'thumbnail')); ?>
                </a>
            </div>
            <div class="group-button-mobile">
                <a href="?add-to-cart=<?php the_ID(); ?>" class="add-cart ajax_add_to_cart">Thêm vào giỏ</a>
                <a href="#" class="compare">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="#" class="add_wishlist">
                    <i class="far fa-heart"></i>
                </a>
            </div>
        </div>
        <div class="product-info">
            <div class="star-rating">
                <span class="star" style="width: 80%"></span>
            </div>
            <div class="product-name">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
            <div class="product-price">
                <?php echo $product->get_price_html(); ?>
            </div>
            <div class="group-button">
                <div class="inner">
                    <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>" class="add-cart ajax_add_to_cart">Thêm vào giỏ</a>
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