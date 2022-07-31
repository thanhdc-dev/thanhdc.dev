<?php get_header(); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9">
                <div class="title"><?php single_cat_title()?></div>
                <div class="posts">
                    <?php
                    $cat = get_query_var('cat');
                    $PozCat = get_category ($cat);
                        $args = array('post_type' => 'post', 'cat' => $PozCat->id);
                        $cpt_query = new WP_Query($args);
                    ?>
                    <?php if ($cpt_query->have_posts()):?>
                        <?php while ($cpt_query->have_posts()): $cpt_query->the_post();?>
                            <div class="post">
                                <a class="post-image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail()?></a>
                                <div class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title()?></a>
                                </div>
                                <?php the_excerpt()?>
                                <a href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        <?php endwhile;?>
                    <?php endif;?>
                </div>
            </div>
            <div class="col-md-12 col-lg-3">
                sidebar
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>