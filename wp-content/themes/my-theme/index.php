<?php get_header(); ?>
<?php get_template_part('slider')?>

<section id="phone-feature" class="product-outer">
    <div class="container  product-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="head">
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
        <div class="row  product-wrapper">
            <div class="col-12">
                <div class="list-product owl-carousel">
                    <?php
                        $taxQuery[] = array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                            'operator' => 'IN',
                        );
                    ?>
                    <?php $args = array( 'post_type' => 'product','posts_per_page' => 10,'ignore_sticky_posts' => 1, 'tax_query' => $taxQuery); ?>
                    <?php $getPosts = new WP_query( $args);?>
                    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
                    <?php while ($getPosts->have_posts()) : $getPosts->the_post(); ?>
                        <?php get_template_part( 'content/product' );?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $category = get_term_by('slug', 'news', 'category')?>
<?php if ($category): ?>
<section id="news-main" class="product-outer">
    <div class="container  product-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="head">
                    <a class="title" href="<?php echo get_term_link($category)?>">
                        <?php echo $category->name?>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 news-list owl-carousel owl-theme">
                <?php
                $args = array('numberposts' => '2', 'category' => $category->term_id);
                $posts = get_posts( $args );
                foreach ( $posts as $index => $post ): ?>
                    <div class="news-item">
                        <div class="news-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail', array('class' => 'thumbnail')); ?>
                            </a>
                        </div>
                        <div class="news-info">
                            <div class="news-head">
                                <span class="news-time">
                                    <span class="news-day">16</span>
                                    <span class="news-month">Mar</span>
                                </span>
                                <div class="news-title">
                                    <a href="<?php the_permalink(); ?>"><?php echo $post->title?></a>
                                </div>
                            </div>
                            <div class="news-metas">
                                <span class="news-author">Posted by: Tony Nguyen</span>
                                <span class="news-count-comment">0 comment</span>
                            </div>
                            <div class="news-des"><?php ?></div>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
