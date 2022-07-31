<?php

/**
 * Khai báo hằng giá trị
 *  THEME_DIR = lấy đường dẫn tuyệt đối thư mục theme
 *  THEME_URL = lấy đường dẫn tương đối thư mục theme
 *  CORE = lấy đường dẫn thư mục /core
 **/
define('THEME_DIR', get_template_directory());
define('THEME_URL', get_template_directory_uri());
define('CORE', THEME_DIR . "/core");

/**
 * Những file /core/init.php
 */
require_once(CORE . "/init.php");

/**
 * Thiết lập chiều rộng nội dung
 */
if (!isset($content_width)) {
    $content_width = 620;
}

/**
 * Khai báo chức năng của theme
 */
if (!function_exists('thanhdc_theme_setup')) {
    function thanhdc_theme_setup()
    {

        /** Thiết lập textdomain*/
        $language_folders = THEME_DIR . '/languages';
        load_theme_textdomain('thanhdc', $language_folders);

        /** Tự động thêm link RSS lên <head>*/
        add_theme_support('automatic-feed-links');

        /** Thêm post thumbnail */
        add_theme_support('post-thumbnails');

        /** Thêm post format */
        add_theme_support(
            'post-formats',
            [
                'aside',
                'gallery',
                // 'link',
                'image',
                // 'quote',
                // 'status',
                'video',
                // 'audio',
                // 'chat',
            ]
        );

        /** Thêm title-tag */
        add_theme_support('title-tag');

        /**Thêm custom background */
        $default_backgrounds = array(
            'default-image'          => '',
            'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
            'default-position-x'     => 'left',    // 'left', 'center', 'right'
            'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
            'default-size'           => 'auto',    // 'auto', 'contain', 'cover'
            'default-repeat'         => 'repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
            'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
            'default-color'          => '',
            'wp-head-callback'       => '_custom_background_cb',
            'admin-head-callback'    => '',
            'admin-preview-callback' => '',
        );
        add_theme_support('custom-background', $default_backgrounds);

        /**Thêm menu */
        register_nav_menu('primary-menu', __('Primary menu', 'Primary menu'));
        register_nav_menu('top-menu', __('Top menu', 'Top menu'));

        /** Tạo sidebar */
        $sidebar = array(
            'name' => __('Main Sidebar', 'thanhdc'),
            'id'    => 'main-sidebar',
            'description'   => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title'  => '<h3 class="widgettitle"',
            'after_title'   => '</h3>'
        );
        register_sidebar($sidebar);

        /** Thêm các tùy chọn của woocommerce */
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
    add_action('init', 'thanhdc_theme_setup');
}


/** Thêm post type lưu slider */
function createSliderPostType()
{
    $label = array(
        'name' => 'Slider hình ảnh', //Tên post type dạng số nhiều
        'singular_name' => 'Slider hình ảnh' //Tên post type dạng số ít
    );

    /** Biến $args là những tham số quan trọng trong Post Type */
    $args = array(
        'labels' => $label,
        'description' => 'Slider hình ảnh trang chủ',
        'supports' => array(
            'title',
            'thumbnail',
            'gallery',
        ),
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => false, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => false, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-format-gallery', // icon sẽ hiển thị https://developer.wordpress.org/resource/dashicons
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'exclude_from_search' => true, //Loại bỏ khỏi kết quả tìm kiếm
        'capability_type' => 'post' //
    );

    register_post_type('slider', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên
}
add_action('init', 'createSliderPostType');


/**
 * Thiết lập menu
 */
if (!function_exists('thanhdc_menu')) {
    function thanhdc_menu($location)
    {
        $menu = array(
            'theme_location'   => $location,
            'container' => 'nav',
            'container_class'   => 'col-12 header3-wrapper',
            'menu_class'    => 'header3-menu',
        );
        wp_nav_menu($menu);
    }
}

/**
 * Hàm tạo phân trang
 */
if (!function_exists('thanhdc_pagination')) {
    function thanhdc_pagination()
    {
        if ($GLOBALS['wp_query']->max_num_pages) {
            return '';
        }
?>
        <nav class="pagination" role="pagination">
            <?php if (get_next_post_link()) : ?>
                <div class="prev">
                    <?php next_post_link(__('Older Posts', 'thanhdc')); ?>
                </div>
            <?php endif; ?>
            <?php if (get_previous_post_link()) : ?>
                <div class="next">
                    <?php previous_post_link(__('Newest Posts', 'thanhdc')) ?>
                </div>
            <?php endif; ?>
        </nav>
        <?php
    }
}

/**
 * Hàm lấy hình thumbnail
 */
if (!function_exists('thanhdc_thumbnail')) {
    function thanhdc_thumbnail($size)
    {
        if ((!is_single() && has_post_thumbnail() && !post_password_required()) || has_post_format('image')) : ?>
            <figure class="post-thumbnail"><?php the_post_thumbnail($size) ?></figure>
        <?php endif; ?>
<?php
    }
}

/**
 * Nhúng các file css
 */
function theme_enqueue_styles()
{
    foreach (glob(THEME_DIR . '/public/css/*.css') as $fileName) {
        $handle = 'wp-style-' . str_replace('.', '-', basename($fileName, '.css'));
        wp_register_style($handle, THEME_URL . '/public/css/' . basename($fileName), 'all');
        wp_enqueue_style($handle);
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

/**
 * Nhúng các file js
 */
function theme_enqueue_scripts()
{
    foreach (glob(THEME_DIR . '/public/js/*.js') as $fileName) {
        $handle = 'wp-script-' . str_replace('.', '-', basename($fileName, '.js'));
        wp_register_script($handle, THEME_URL . '/public/js/' . basename($fileName), array('jquery'));
        wp_enqueue_script($handle);
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

/**
 * Change number or products per row to 4
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4; // 4 products per row
	}
}
function add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	));
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );

/**
 * Change several of the breadcrumb defaults
 */
if (!function_exists('change_woocommerce_breadcrumbs')) {
    function change_woocommerce_breadcrumbs() {
        return array(
                'delimiter'   => '<span>&nbsp;›&nbsp;</span>',
                'wrap_before' => '<div class="breadcrumb" itemprop="breadcrumb">',
                'wrap_after'  => '</div>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            );
    }
}
add_filter( 'woocommerce_breadcrumb_defaults', 'change_woocommerce_breadcrumbs' );

if (!function_exists('woocommerce_template_loop_product_link_open'))   {
	function woocommerce_template_loop_product_link_open() {
		global $product;

		$link = apply_filters( 'woocommerce_loop_product_link', get_the_permalink(), $product );

		echo '<a href="' . esc_url( $link ) . '" class="product__link">';
	}
}