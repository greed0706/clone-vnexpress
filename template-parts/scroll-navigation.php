<?php
/*
 * Title: scroll navigation 1 row, 20 content main and more support content
 * Slug: my-first-column
 * Categories: scroll navigation
 * Block Types: content-main\scroll-navigation.php
 * Description: 1 thanh cuộn ngang chứa các nội dung chính  
 */
?>

<!-- SVG SPRITE phải nằm ở đây -->
<?php get_template_part('template-parts/svg-sprite'); ?>

<!-- Function gọi các Categories -->
<?php
function render_category_items($parent_id = 0)
{
    $categories = get_categories(array(
        'parent' => $parent_id,
        'hide_empty' => false,
        'orderby' => 'name',
        'order' => 'ASC',
    ));

    if (empty($categories))
        return;

    foreach ($categories as $cat) {
        $cat_link = get_category_link($cat->term_id);

        // Kiểm tra có con không
        $children = get_categories(array(
            'parent' => $cat->term_id,
            'hide_empty' => false
        ));

        $li_class = 'nav-item menu-' . esc_attr($cat->slug);

        if (!empty($children)) {
            $li_class .= ' dropdown';
        }

        echo '<li class="' . $li_class . ' col">';
        if (!empty($children)) {
            echo '<a  class="nav-link dropdown-toggle text-dark" href="' . esc_url($cat_link) . '" id="dropdown-' . esc_attr($cat->slug) . '" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
            echo esc_html($cat->name);
            echo '</a>';
            echo '<ul class="dropdown-menu" aria-labelledby="dropdown-' . esc_attr($cat->slug) . '">';
            render_category_items($cat->term_id);
            echo '</ul>';
        } else {
            echo '<a class="nav-link" href="' . esc_url($cat_link) . '">' . esc_html($cat->name) . '</a>';
        }
        echo '</li>';
    }
}
?>

<!-- Menu Nav -->
<nav class="scroll-sticky d-flex flex-row navbar navbar-expand-lg bg-white fs-6" style="max-width:100%; transform: scale(0.863);transform-origin: top left;">
    <div class="container-fluid ">
        <div class="collapse navbar-collapse row " id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <!-- Item Home -->
                <li class="nav-item home rounded-circle bg-dark-subtle col">
                    <a class="nav-link d-flex align-items-center gap-2" href="<?php echo esc_url(home_url('/')); ?>">
                        <svg class="ic ic-search" width="20" height="20">
                            <use href="#home"></use>
                        </svg>
                    </a>
                </li>

                <!-- Toàn bộ Category -->
                <?php render_category_items(); ?>

                <!-- Item Tất cả cuối cùng -->
                <li class="nav-item all-menu col">
                    <button class="nav-link d-flex align-items-center gap-2 " data-bs-toggle="collapse"
                        href="#collapseExample">
                        <svg class="ic ic-search" width="20" height="20">
                            <use href="#menu"></use>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    nav.scroll-sticky {
        position: sticky !important;
        top: 0;
        z-index: 9999;
        background: #fff;

    }
</style>