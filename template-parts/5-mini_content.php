<?php
/*
 * Title: mini contents 2 columns, 2 rows
 * Slug: my-first-column
 * Categories: postcard
 * Block Types: template-parts/5-mini_content.php
 * Description: Hiển thị 4 category, mỗi category 1 bài lớn + 2 bài nhỏ
 */
?>

<?php
function render_home_three_columns($slugs = [], $extra_class = '')
{
    if (empty($slugs))
        return;

    // Chia 4 category thành 2 cột
    $categories_left = array_slice($slugs, 0, 2);
    $categories_right = array_slice($slugs, 2, 2);
    ?>

    <div class="container bordor-bottom" zoom="0.8">
        <div class="row g-3 border-top border-bottom border-2 pb-4 mt-4" style="zoom: 0.8;">

            <!-- Cột 1: 2 category đầu -->
            <div class="col-lg-4 d-flex flex-column gap-3 border-end  border-2 " style="padding-left: 50px;">
                <?php foreach ($categories_left as $slug):
                    $parent_cat = get_category_by_slug($slug);
                    if (!$parent_cat)
                        continue;

                    $child_cats = get_categories([
                        'child_of' => $parent_cat->term_id,
                        'hide_empty' => false,
                        'orderby' => 'term_id',
                        'order' => 'ASC',
                        'number' => 3
                    ]);

                    $query = new WP_Query([
                        'posts_per_page' => 3,
                        'category__in' => array_merge([$parent_cat->term_id], wp_list_pluck($child_cats, 'term_id')),
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ]);
                    ?>
                    <div class="item-box-cate box-last border-top border-2  pe-2 " style=" width: 390; height: auto;">
                        <hgroup
                            class="title-box-category d-flex flex-wrap align-items-center mb-2 <?php echo esc_attr($extra_class); ?>">
                            <h2 class="parent-cate me-2 fw-bold border-bottom border-dark pb-1 text-dark">
                                <a class="text-dark text-decoration-none"
                                    href="<?php echo get_category_link($parent_cat->term_id); ?>"><?php echo esc_html($parent_cat->name); ?></a>
                            </h2>
                            <?php if (!empty($child_cats)):
                                foreach ($child_cats as $child): ?>
                                    <span class="sub-cate me-2 ">
                                        <a class="text-dark text-decoration-none"
                                            href="<?php echo get_category_link($child->term_id); ?>"><?php echo esc_html($child->name); ?></a>
                                    </span>
                                <?php endforeach; endif; ?>
                        </hgroup>
                        <div class="content-box-category mt-2">
                            <?php $i = 0;
                            if ($query->have_posts()):
                                while ($query->have_posts()):
                                    $query->the_post();
                                    $i++;
                                    $first_img = get_post_first_image();
                                    if ($i == 1): ?>
                                        <article class="item-news mb-2 ">
                                            <div class="thumb-art mb-1">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url($first_img); ?>" style="width: 340px; height: auto;"
                                                        alt="<?php the_title_attribute(); ?>">
                                                </a>
                                            </div>
                                            <h4><a class="text-dark text-decoration-none"
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p class="description fs-6 text-body-tertiary ">
                                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                            </p>
                                        </article>
                                    <?php else: ?>
                                        <li class="item-news mb-1 border-top p-3"><a class="text-dark text-decoration-none"
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endif; endwhile; else: ?>
                                <p>Chưa có bài viết</p>
                            <?php endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Cột 2: 2 category tiếp theo -->
            <div class="col-lg-4 d-flex flex-column gap-3 ms-2  " style=" width: auto;">
                <?php foreach ($categories_right as $slug):
                    $parent_cat = get_category_by_slug($slug);
                    if (!$parent_cat)
                        continue;

                    $child_cats = get_categories([
                        'child_of' => $parent_cat->term_id,
                        'hide_empty' => false,
                        'orderby' => 'term_id',
                        'order' => 'ASC',
                        'number' => 3
                    ]);

                    $query = new WP_Query([
                        'posts_per_page' => 3,
                        'category__in' => array_merge([$parent_cat->term_id], wp_list_pluck($child_cats, 'term_id')),
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ]);
                    ?>
                    <div class="item-box-cate box-last border-top border-2  pe-2 " style=" width: 340px; height: auto;">
                        <hgroup
                            class="title-box-category d-flex flex-wrap align-items-center mb-2 <?php echo esc_attr($extra_class); ?>">
                            <h2 class="parent-cate me-2 fw-bold border-bottom border-dark pb-1">
                                <a class="text-dark text-decoration-none"
                                    href="<?php echo get_category_link($parent_cat->term_id); ?>"><?php echo esc_html($parent_cat->name); ?></a>
                            </h2>
                            <?php if (!empty($child_cats)):
                                foreach ($child_cats as $child): ?>
                                    <span class="sub-cate me-2">
                                        <a class="text-dark text-decoration-none"
                                            href="<?php echo get_category_link($child->term_id); ?>"><?php echo esc_html($child->name); ?></a>
                                    </span>
                                <?php endforeach; endif; ?>
                        </hgroup>
                        <div class="content-box-category mt-2">
                            <?php $i = 0;
                            if ($query->have_posts()):
                                while ($query->have_posts()):
                                    $query->the_post();
                                    $i++;
                                    $first_img = get_post_first_image();
                                    if ($i == 1): ?>
                                        <article class="item-news mb-2">
                                            <div class="thumb-art mb-1">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url($first_img); ?>" style="width: 340px; height: 204px;"
                                                        alt="<?php the_title_attribute(); ?>">
                                                </a>
                                            </div>
                                            <h4><a class="text-dark text-decoration-none"
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <p class="description fs-6 text-body-tertiary ">
                                                <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                            </p>
                                        </article>
                                    <?php else: ?>
                                        <li class="item-news mb-1 border-top p-3"><a class="text-dark text-decoration-none"
                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endif; endwhile; else: ?>
                                <p>Chưa có bài viết</p>
                            <?php endif;
                            wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Cột 3: 5 bài mới nhất -->
            <div class="width_common wrapper-sticky col-lg-4">
                <div class=" inner-wrap-sticky " style="background-color: #f7f7f7;">
                    <hgroup class="width_common title-box-category title-box-small d-flex ">
                        <h4 class="parent-cate">
                            <span class="inner-title">Sự kiện</span>
                        </h4>
                        <div class="container-button-box d-flex gap-3">
                            <div
                                class="swiper-button-box swiper-button-box-prev swiper-button-prev-quatang swiper-button-disabled">
                                <svg class="ic ic-arrow-left" width="20" height="20">
                                    <use href="#swiper-prev"></use>
                                </svg>
                            </div>
                            <div class=" swiper-button-box swiper-button-box-next swiper-button-next-quatang">
                                <svg class="ic ic-arrow-right" width="20" height="20">
                                    <use href="#swiper-next"></use>
                                </svg>
                            </div>
                        </div>
                    </hgroup>
                    <div class="width_common wrap-slide-business">
                        <div class="swiper-container swiper-container-horizontal swiper-container-multirow">

                            <?php
                            $latest_posts = new WP_Query([
                                'posts_per_page' => 5,
                                'orderby' => 'date',
                                'order' => 'DESC',
                            ]);
                            ?>
                            <?php if ($latest_posts->have_posts()): ?>
                                <article class="box-shop-sell swiper-wrapper" style="order: 0;width: 308px;margin-right: 15px;">
                                    <?php while ($latest_posts->have_posts()):
                                        $latest_posts->the_post();
                                        $first_img = get_post_first_image(); ?>
                                        <article class="box-category d-flex border p-2"
                                            style="order: 0; width: 274px; margin-right: 15px;">
                                            <div class="thumb-art mb-1 ">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url($first_img); ?>"
                                                        alt="<?php the_title_attribute(); ?>"
                                                        style="width:100%; height:auto; object-fit: cover;">
                                                </a>
                                            </div>
                                            <h4 class="title-news"><a class="text"
                                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                        </article>
                                    <?php endwhile; ?>
                                </article>

                            <?php endif;
                            wp_reset_postdata(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end container -->

    <style>
        /* Khối sticky bên phải */
        .inner-wrap-sticky {
            background-color: #f7f7f7;
            padding: 15px;
            border-radius: 6px;
            position: sticky;
            top: 70px;
        }

        /* Slider sự kiện */
        .wrap-slide-business {
            width: 290;
            overflow: hidden;
            margin-left: 80px;
        }

        .wrap-slide-business .swiper-wrapper {
            display: flex;
            flex-direction: row;
            /* xếp ngang thay vì column */
            flex-wrap: nowrap;
            /* không cho wrap xuống dòng */
            gap: 15px;
            height: auto;
            position: relative;
        }

        .wrap-slide-business .box-category {
            height: 150px;
            width: 274px;
            flex: 0 0 274px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 10px;
        }

        /* Tiêu đề bài viết */
        .box-category .title-news {
            font-family: "Merriweather", serif;
            font-size: 16px;
            line-height: 1.4;
            margin-bottom: 8px;
        }

        .box-category .title-news a {
            color: #222;
            text-decoration: none;
        }

        /* Tiêu đề trong box-shop-sell (nếu có) */
        .box-shop-sell .box-category .title-news {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
            padding-left: 20px;
            margin-bottom: 0;
        }

        /* Nút điều hướng slider */
        .container-button-box {
            position: absolute;
            right: 0;
            padding-right: 10px;
        }

        .swiper-button-box {
            width: 28px;
            height: 28px;
            background: #fcfaf6;
            border: 1px solid #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease, opacity 0.3s ease;
        }

        .swiper-button-box:hover {
            background: #f3efe6;
        }

        .swiper-button-box.disabled {
            opacity: 0.4;
            pointer-events: none;
        }
    </style>

    <script>
        // Lấy wrapper đúng theo HTML hiện tại
        const wrapper = document.querySelector('.wrap-slide-business .swiper-wrapper');
        const items = wrapper ? wrapper.querySelectorAll('.box-category') : [];
        const itemWidth = 290; // chiều rộng mỗi item
        const visibleItems = 1; // số lượng item hiển thị cùng lúc
        const totalItems = items.length;

        let currentOffset = 0;
        const maxOffset = -(itemWidth * (totalItems - visibleItems));

        // Nút điều hướng đúng class
        const nextBtn = document.querySelector('.swiper-button-box-next');
        const prevBtn = document.querySelector('.swiper-button-box-prev');

        function updateButtons() {
            if (!nextBtn || !prevBtn) return;
            nextBtn.disabled = currentOffset <= maxOffset;
            prevBtn.disabled = currentOffset >= 0;
            nextBtn.classList.toggle('disabled', nextBtn.disabled);
            prevBtn.classList.toggle('disabled', prevBtn.disabled);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                if (currentOffset > maxOffset) {
                    currentOffset -= itemWidth;
                    wrapper.style.transform = `translateX(${currentOffset}px)`;
                    wrapper.style.transition = 'transform 0.3s ease';
                    updateButtons();
                }
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                if (currentOffset < 0) {
                    currentOffset += itemWidth;
                    wrapper.style.transform = `translateX(${currentOffset}px)`;
                    wrapper.style.transition = 'transform 0.3s ease';
                    updateButtons();
                }
            });
        }

        updateButtons();
    </script>

    <?php
}


// Gọi hàm
render_home_three_columns(["thoi-su", "the-gioi", "phap-luat", "y-kien"]);
?>