<?php
/*
Template Name: Category Page
*/
?>

<?php get_header(); ?>

<section class="category-page">
    <section class="section top-header border-bottom">
        <?php get_template_part("template-parts/scroll-navigation") ?>
    </section>
    <section class="wrap-all-menu">
        <?php get_template_part("template-parts/wrap-all-menu") ?>
    </section>
    <section class="cotent">

        <div class="mt-4 container-title d-flex justify-content-center   " style="margin-right: 190px;">
            <?php
            $parent_cat = get_queried_object(); // Lấy category hiện tại
            
            if ($parent_cat && $parent_cat->taxonomy === 'category'):

                // Lấy subcategories
                $sub_cats = get_categories([
                    'parent' => $parent_cat->term_id,
                    'hide_empty' => false
                ]);
                ?>
                <hgroup class=" width_common title-box-category gap-3 d-flex align-items-center border-bottom pb-2"
                    style="width: fit-content;">
                    <h2 class="parent-cate ">
                        <a href="<?php echo get_category_link($parent_cat->term_id); ?>" class="inner-title fw-bold"
                            title="<?php echo esc_attr($parent_cat->name); ?>">
                            <?php echo esc_html($parent_cat->name); ?>
                        </a>
                    </h2>

                    <?php foreach ($sub_cats as $sub): ?>
                        <span class="sub-cate ">
                            <a class="text-secondary small align-self-center fw-medium "
                                href="<?php echo get_category_link($sub->term_id); ?>"
                                title="<?php echo esc_attr($sub->name); ?>">
                                <?php echo esc_html($sub->name); ?>
                            </a>
                        </span>
                    <?php endforeach; ?>
                </hgroup>
            </div>

        <?php endif; ?>
        </div>

        <div class="section section_topstory ">
            <div class="container mt-4 mb-4" style="margin: 0 auto; zoom: 0.9;">
                <div class="row d-flex">

                    <!-- CỘT TRÁI -->
                    <div class="col-12 col-lg-8">
                        <div class="row">

                            <?php
                            /* ============================
                             * QUERY 3 BÀI MỚI NHẤT
                             * ============================ */
                            $top_posts = new WP_Query([
                                'posts_per_page' => 4,
                                'orderby' => 'date',
                                'order' => 'DESC',
                            ]);

                            $posts = [];
                            if ($top_posts->have_posts()) {
                                while ($top_posts->have_posts()) {
                                    $top_posts->the_post();
                                    $posts[] = [
                                        'id' => get_the_ID(),
                                        'title' => get_the_title(),
                                        'img' => get_post_first_image(),
                                        'link' => get_permalink(),
                                        'desc' => wp_trim_words(strip_tags(get_the_content()), 50, '...')
                                    ];
                                }
                            }
                            wp_reset_postdata();
                            ?>

                            <?php if (!empty($posts)): ?>
                                <!-- BÀI LỚN -->
                                <div class="col-md-12 mb-4 border-bottom">
                                    <article class="item-news item-top-first row">
                                        <div class="thumb-art col-md-9 mb-3">
                                            <a href="<?= esc_url($posts[0]['link']); ?>">
                                                <img src="<?= esc_url($posts[0]['img']); ?>" class="img-fluid w-100" alt="">
                                            </a>
                                        </div>

                                        <div class="content col-md-3">
                                            <h2 class="h4 fw-bold text-dark">
                                                <a class="text-dark text-decoration-none"
                                                    href="<?= esc_url($posts[0]['link']); ?>">
                                                    <?= esc_html($posts[0]['title']); ?>
                                                </a>
                                            </h2>
                                            <p class="text-muted"><?= $posts[0]['desc']; ?></p>
                                        </div>
                                    </article>
                                </div>
                            <?php endif; ?>

                            <!-- 2 BÀI NHỎ + GÓC NHÌN -->
                            <div class="row border-bottom border-2 pe-2">

                                <?php if (!empty($posts)): ?>
                                    <?php for ($i = 1; $i < count($posts); $i++): ?>
                                        <div class="col-4 mb-4">
                                            <article class="item-news item-top-sub">
                                                <div class="thumb-art mb-2">
                                                    <a href="<?= esc_url($posts[$i]['link']); ?>">
                                                        <img src="<?= esc_url($posts[$i]['img']); ?>" class="img-fluid w-100"
                                                            alt="">
                                                    </a>
                                                </div>

                                                <h3 class="h6">
                                                    <a class="text-dark text-decoration-none"
                                                        href="<?= esc_url($posts[$i]['link']); ?>">
                                                        <?= esc_html($posts[$i]['title']); ?>
                                                    </a>
                                                </h3>
                                            </article>
                                        </div>
                                    <?php endfor; ?>
                                <?php endif;


                                wp_reset_postdata();
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section section_stream_home py-4" style=" margin-left: 200px;">
            <div class="container" style="transform: scale(0.8); transform-origin: top left;">
                <div class="row gx-4">

                    <!-- ================= LEFT COLUMN ================= -->
                    <div class="col-md-4 border-end">

                        <?php
                        $parent_cat = get_queried_object();
                        if ($parent_cat && $parent_cat->taxonomy === 'category'):

                            $child_cats = get_categories([
                                'child_of' => $parent_cat->term_id,
                                'hide_empty' => false,
                            ]);
                            $next_posts = new WP_Query([
                                'posts_per_page' => 20,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'category__in' => array_merge(
                                    [$parent_cat->term_id],
                                    wp_list_pluck($child_cats, 'term_id')
                                ),
                            ]);

                            if ($next_posts->have_posts()):
                                while ($next_posts->have_posts()):
                                    $next_posts->the_post();
                                    $first_img = get_post_first_image();
                                    ?>
                                    <article class="item-news pb-3 mb-3 border-bottom">
                                        <h3 class="h6 fw-bold mb-2">
                                            <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>

                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url($first_img); ?>"
                                                        style="width:150px; height:90px; object-fit:cover;">
                                                </a>
                                            </div>

                                            <div class="ps-3">
                                                <p class="small text-muted mb-1">
                                                    <a href="<?php the_permalink(); ?>" class="text-muted text-decoration-none">
                                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                                    </a>
                                                </p>
                                                <time class="small text-secondary"><?php echo get_the_date('d/m/Y'); ?></time>
                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                endwhile;
                            endif;
                        endif;

                        wp_reset_postdata();
                        ?>
                    </div>

                    <!-- ================= RIGHT COLUMN ================= -->

                    <div class="col-md-8 ">

                        <?php
                        $parent_cat = get_queried_object();

                        if ($parent_cat && $parent_cat->taxonomy === 'category'):

                            $child_cats = get_categories([
                                'child_of' => $parent_cat->term_id,
                                'hide_empty' => false,
                            ]);

                            // Lấy thật nhiều bài để chia nhóm
                            $cat_posts = new WP_Query([
                                'posts_per_page' => 20,
                                'category__in' => array_merge(
                                    [$parent_cat->term_id],
                                    wp_list_pluck($child_cats, 'term_id')
                                ),
                            ]);
                            ?>


                            <!-- TITLE CATEGORY -->
                            <div class="mb-4 pb-3 border-bottom">
                                <h1 class="h4 fw-bold mb-0"><?php echo esc_html($parent_cat->name); ?></h1>
                            </div>

                            <?php
                            if ($cat_posts->have_posts()):

                                $i = 0;

                                while ($cat_posts->have_posts()) {
                                    $cat_posts->the_post();
                                    $i++;
                                    $index = ($i - 1) % 5 + 1; // Tính vị trí trong nhóm 1–5
                                    $first_img = get_post_first_image();

                                    /* ================= ITEM #1 ================= */
                                    if ($index === 1): ?>
                                        <div class="row  ">
                                            <article class="row mb-2 col-md-8 pb-3 border-bottom">
                                                <div class="col-md-6">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img src="<?php echo esc_url($first_img); ?>" class="w-100"
                                                            style="width: 200px; height: 130px; object-fit:cover;">
                                                    </a>
                                                </div>
                                                <div class="col-md-6 border-end">
                                                    <h2 class="h5 fw-bold mb-2">
                                                        <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h2>
                                                    <p class="text-muted">
                                                        <a href="<?php the_permalink(); ?>" class="text-muted text-decoration-none">
                                                            <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </article>

                                            <?php
                                        /* ================= ITEM #2 ================= */
                                    elseif ($index === 2): ?>

                                            <article class="mb-2 col-md-4 pb-3 border-bottom">
                                                <h3 class="h6 fw-bold">
                                                    <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                                <p class="small text-muted">
                                                    <a href="<?php the_permalink(); ?>" class="text-muted text-decoration-none">
                                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                                    </a>
                                                </p>
                                            </article>
                                        </div>
                                        <?php
                                        /* ================= ITEM #3–5 ================= */
                                    else:
                                        if ($index === 3)
                                            echo '<ul class="row g-3 mt-1 border-bottom mb-4">';
                                        ?>

                                        <li class="col-md-4">
                                            <article>
                                                <h3 class="h6 fw-bold">
                                                    <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </article>
                                        </li>

                                        <?php
                                        if ($index === 5)
                                            echo '</ul>'; // Kết thúc nhóm nhỏ
                                    endif;
                                } // end while
                        
                                wp_reset_postdata();
                            endif;

                        endif;
                        ?>

                    </div>

                </div>

            </div>
        </div>
        </div>

    </section>
</section>
<style>
    .category-page a {
        text-decoration: none;
    }

    .inner-title {
        color: #B52759;
        font-family: "Merriweather", serif;
        font-size: 28px;
        white-space: nowrap;
    }

    body {
        font-size: 14px;
        font-weight: 400;
        font-family: Arial, sans-serif !important;
        color: #1b1b1b;
        text-decoration: none;
    }

    a {
        transition: color 0.3s;
    }

    a:hover {
        color: rgba(23, 66, 237, 0.67) !important;
    }
</style>
<?php get_footer(); ?>