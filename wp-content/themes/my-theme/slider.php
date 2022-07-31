<section id="slider-main">
    <div class="container">
        <div class="row">
            <div class="col-12  owl-carousel owl-theme slider-content">
                <?php 
                    $args = array('posts_per_page' => 5, 'post_type' => 'slider');
                    $the_query = new WP_Query( $args );
                ?>
                <?php if ( $the_query->have_posts() ): ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="slider-item">
                        <img src="<?php echo the_post_thumbnail_url('full')?>" alt="<?php echo the_title()?>">
                        <a href="#" class="btn-shopping">Mua ngay</a>
                    </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </div>
    </div>
</section>