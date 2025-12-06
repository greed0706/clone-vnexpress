<?php
function myfirstblog_setup()
{
    // Hỗ trợ title tag và ảnh đại diện
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // Đăng ký menu
    register_nav_menus([
        'main-menu' => __('Menu Chính', 'textdomain'),
        'footer-menu' => __('Footer Menu', 'textdomain'),
    ]);
}
add_action('after_setup_theme', 'myfirstblog_setup');

// Enqueue style
function myproject_enqueue_styles()
{
    wp_enqueue_style('myproject-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'myproject_enqueue_styles');
?>


<?php
// Hàm lấy ảnh Featured Image hoặc ảnh đầu tiên trong post content

require get_template_directory() . '/function-image.php';
?>

<?php get_template_part('template-parts/svg-sprite'); ?>

<?php
function render_category_recursive($parent_id = 0)
{
    $categories = get_categories([
        'parent' => $parent_id,
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC'
    ]);

    if (empty($categories))
        return;

    echo '<ul>';

    foreach ($categories as $cat) {

        echo '<li>';
        echo '<a href="' . esc_url(get_category_link($cat->term_id)) . '">' . esc_html($cat->name) . '</a>';

        // Gọi đệ quy tiếp
        render_category_recursive($cat->term_id);

        echo '</li>';
    }

    echo '</ul>';

}


?>