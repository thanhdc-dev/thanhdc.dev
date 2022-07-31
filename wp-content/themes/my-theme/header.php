<!DOCTYPE html>
<html <?php language_attributes(); ?> />

<head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <link rel="profile" href="htt://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="header-mobile">
        <div class="container">
            <div class="row menu-mb-col">
                <div class="menu-mb-icon">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="menu-mb-logo">
                    <a href="#">
                        <img alt="TechOne" src="<?php echo get_template_directory_uri()?>/public/images/logo.png">
                    </a>
                </div>
                <div class="menu-mb-search">
                    <a href="">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
                <div class="menu-mb-login">
                    <a href="">
                        <i class="fa fa-user-circle"></i>
                    </a>
                </div>
                <div class="menu-mb-compare">
                    <a href="">
                        <i class="fas fa-exchange-alt"></i>
                    </a>
                </div>
                <div class="menu-mb-cart">
                    <a href="" class="cart">
                        <span class="icon">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="count">1</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="fix-mobile" style="width: 100%;"></div>
    <section id="header">
        <div class="header1">
            <div class="container">
                <div class="row header1-content">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'   => 'top-menu',
                            'container' => 'false',
                            'menu_class'    => 'left top-menu',
                        )
                    );
                    ?>
                    <ul class="right">
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header2">
            <div class="container">
                <div class="row header2-content">
                    <div class="col-12 col-xl-2 text-center">
                        <div class="logo">
                            <a href="<?php bloginfo('url') ?>">
                                <img alt="TechOne" src="<?php echo get_template_directory_uri(); ?>/public/images/logo.png">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 mid">
                        <form action="">
                            <input type="text" placeholder="Search...">
                            <button class="btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5">
                        <div class="header2-control">
                            <a class="compare" href="compare.html">
                                <span class="icon">
                                    <i class="fas fa-exchange-alt"></i>
                                </span>
                                <span class="content">
                                    <span class="text">So sánh &nbsp;</span><span class="compare-count">(2)</span>
                                </span>
                            </a>
                            <div class="cart-wrapper">
                                <a href="<?php bloginfo('url'); ?>/cart" class="cart">
                                    <span class="icon">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span class="count">1</span>
                                    </span>
                                    <div class="content">
                                        <span class="text">cart</span>
                                        <span class="amount">39.990.000₫</span>
                                    </div>
                                </a>
                                <div class="mini-cart-content">
                                    <div class="minicart-content-wrapper">
                                        <div class="minicart-title">Bạn có 1 sản phẩm trong giỏ</div>
                                        <div class="minicart-items-wrapper">
                                            <ul class="minicart-items">
                                                <li class="item">
                                                    <a href="" class="thumb">
                                                        <img src="images/iphone-xs-max-256gb-white-400x460.png" alt="">
                                                    </a>
                                                    <div class="info">
                                                        <h3 class="product-name">HD Led TVs Nimbus</h3>
                                                        <div class="product-item-qty">
                                                            <span class="number">
                                                                <span class="qty">7 × <span class="amount">500.00</span>
                                                                </span>
                                                            </span>
                                                        </div>
                                                        <a href="" class="action delete" title="Remove this item" data-product_id="434" data-product_sku="12345611">
                                                            <span>
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="subtotal">
                                            <span class="text">Tổng tiền: </span>
                                            <span class="total">
                                                39.990.000₫
                                            </span>
                                        </div>
                                        <div class="actions">
                                            <a href="" class="btn btn-checkout">Thanh toán</a>
                                            <a class="btn btn-viewcart" href="">Xem giỏ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="header3">
            <div class="container">
                <div class="row">
                    <?php thanhdc_menu('primary'); ?>
                </div>
            </div>
        </nav>
    </section>
