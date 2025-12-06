<?php
/*
 * Title: Technology row, 3 column
 * Slug: my-first-column
 * Categories: cong-nghe
 * Block Types: pattern/3-technology.php
 * Description: 1 bảng nội dung về công nghệ có 3 cột
 */
?>
<section class="section section_container tech-row-3col">
    <section class="section section_container ">

        <?php
        $parent_slug = 'khoa-hoc-cong-nghe';

        // Lấy category theo slug
        $parent_cat = get_term_by('slug', $parent_slug, 'category');

        if ($parent_cat):

            // Lấy child category
            $child_cats = get_categories([
                'child_of' => $parent_cat->term_id,
                'hide_empty' => false,
            ]);

            // Query 7 bài mới nhất cho 3 cột
            $posts_query = new WP_Query([
                'posts_per_page' => 7,
                'category__in' => array_merge([$parent_cat->term_id], wp_list_pluck($child_cats, 'term_id')),
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            ?>

            <section class="section section_khcn mt20 section_khcn_v2 ">
                <div class="container border  border-1 p-2"
                    style="background-color: #FCFAF6; zoom: 0.8; border-style:rgba(134, 116, 40, .16);">

                    <!-- Head title và child categories -->
                    <div class="head-title pt-2">
                        <div class="d-flex flex-wrap  align-items-center ">
                            <h2 class="h2 fw-bold me-2 ">
                                <a href="<?php echo get_category_link($parent_cat->term_id); ?>" class="fw-bold"
                                    style="color: #867428; text-decoration: none;">
                                    <?php echo esc_html($parent_cat->name); ?>
                                </a>
                            </h2>
                            <div class="d-flex align-items-end">
                                <?php foreach (array_slice($child_cats, 0, 7) as $child): ?>
                                    <div class="me-1 small px-3 py-1 rounded-pill border-1 border "
                                        style="background-color: #F3EFE6;border-style:rgba(134, 116, 40, .16);">
                                        <a href="<?php echo get_category_link($child->term_id); ?>" class="fw-bold"
                                            style="color: #867428; text-decoration: none;">
                                            <?php echo esc_html($child->name); ?>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <!-- 3 cột bài viết -->
                    <div class="width_common section_box_cate flexbox d-flex row border-bottom mb-4 pb-4">
                        <?php
                        $i = 0;
                        if ($posts_query->have_posts()):
                            while ($posts_query->have_posts()):
                                $posts_query->the_post();
                                $i++;

                                $first_img = get_post_first_image();

                                // Cột trái: bài viết nổi bật
                                if ($i === 1): ?>
                                    <div class="col-boxcate colbox-left col-6 p-3 border-end">
                                        <article class="item-news full-thumb">
                                            <?php if ($first_img): ?>
                                                <div class="thumb-art">
                                                    <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3"
                                                        title="<?php the_title_attribute(); ?>">
                                                        <picture>
                                                            <img src="<?php echo esc_url($first_img); ?>"
                                                                alt="<?php the_title_attribute(); ?>" loading="lazy" class=" w-100"
                                                                style=" width: 500px; height: 300px;">
                                                        </picture>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="content-art">
                                                <h4 class="title-news">
                                                    <a class="fs-1 text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <p class="description fs-5 text-body-tertiary ">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                                </p>
                                            </div>
                                        </article>
                                    </div>

                                    <?php
                                    // Cột giữa: 2 bài viết
                                elseif ($i === 2): ?>
                                    <div class="col-boxcate colbox-center col-3 p-3 border-end" style=" zoom: 0.9;">
                                    <?php endif;
                                if ($i === 2 || $i === 3): ?>
                                        <article class="item-news full-thumb mb-3 border-bottom p-2 ">
                                            <?php if ($first_img): ?>
                                                <div class="thumb-art ">
                                                    <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3"
                                                        title="<?php the_title_attribute(); ?>">
                                                        <picture>
                                                            <img src="<?php echo esc_url($first_img); ?>"
                                                                alt="<?php the_title_attribute(); ?>" loading="lazy"
                                                                class="img-fluid w-100">
                                                        </picture>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <h4 class="title-news pt-2 ">
                                                <a class="fs-5 text-dark" href="<?php the_permalink(); ?>"
                                                    style=""><?php the_title(); ?></a>
                                            </h4>
                                        </article>
                                    <?php endif;

                                if ($i === 3): ?>
                                    </div> <!-- Đóng cột giữa -->
                                <?php endif;

                                // Cột phải: danh sách bài viết nhỏ
                                if ($i === 4): ?>
                                    <div class="col-boxcate colbox-right col-3 ">
                                    <?php endif;

                                if ($i >= 4 && $i <= 7): ?>
                                        <article class="item-news d-flex pb-2 border-bottom" style="zoom: 1.2;">
                                            <?php if ($first_img): ?>
                                                <div class="-art me-2">
                                                    <a href="<?php the_permalink(); ?>" class="tzhumb"
                                                        title="<?php the_title_attribute(); ?>">
                                                        <picture>
                                                            <img src="<?php echo esc_url($first_img); ?>"
                                                                alt="<?php the_title_attribute(); ?>" loading="lazy"
                                                                style="width: 100px; height: 60px; object-fit: cover;">
                                                        </picture>
                                                    </a>
                                                </div>
                                            <?php endif; ?>

                                            <div class="conten-art flex-grow-1">
                                                <h4 class="title-neư mb-1">
                                                    <a href="<?php the_permalink(); ?>" class="fs-6  text-dark">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </article>

                                    <?php endif;

                                if ($i === 7): ?>
                                    </div> <!-- Đóng cột phải -->
                                <?php endif;

                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <!-- Slider dưới cùng -->
                    <div class="section-khcn d-flex  " style="transform: scale(1); transform-origin: top left;">
                        <h2 class="title">
                            <a href="<?php echo get_category_link($parent_cat->term_id); ?>">
                                Hoạt động <br>
                                Bộ KH&CN <br>
                                <span>(S.T.I.D)</span>
                            </a>
                        </h2>

                        <div class="khcn-slider swiper ps-5">
                            <div class="all-swiper-wrapper ">
                                <div class="d-flex swiper-wrapper"
                                    style="transform: translate3d(-309.333px, 0px, 0px); transition-duration: 0ms;">
                                    <?php
                                    $slider_query = new WP_Query([
                                        'posts_per_page' => 5,
                                        'category__in' => array_merge([$parent_cat->term_id], wp_list_pluck($child_cats, 'term_id')),
                                        'offset' => 7,
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                    ]);

                                    if ($slider_query->have_posts()):
                                        while ($slider_query->have_posts()):
                                            $slider_query->the_post();
                                            $first_img = get_post_first_image();
                                            ?>
                                            <article class="item-news d-flex me-2">
                                                <?php if ($first_img): ?>
                                                    <div class="thumb-art">
                                                        <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3">
                                                            <img src="<?php echo esc_url($first_img); ?>"
                                                                alt="<?php the_title_attribute(); ?>" loading="lazy" class="">
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <h4 class="title-news">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                            </article>
                                            <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                </div>
                            </div>

                            <!-- Swiper navigation -->
                            <div class=" swiper-button-box swiper-button-next rounded-circle">
                                <svg width="20" height="20">
                                    <use href="#swiper-next"></use>
                                </svg>
                            </div>
                            <div class="swiper-button-box swiper-button-prev rounded-circle">
                                <svg width="20" height="20">
                                    <use href="#swiper-prev"></use>
                                </svg>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                </div>
            </section>

        <?php endif; ?>
    </section>
</section>
<style>
    <style>

    /* Namespace cho module */
    .tech-row-3col {
        width: 100%;
        float: left;
    }

    /* Container */
    .tech-row-3col .container {
        max-width: 1130px;
        padding: 0 15px;
        margin: 0 auto;
        position: relative;
    }

       /* Flexbox cơ bản */
    .tech-row-3col .flexbox {
        display: flex;
        flex-wrap: wrap;
    }

    /* Columns */
    .tech-row-3col .colbox-left {
        width: 49.092%;
        padding-right: 40px;
        position: relative;
    }

    .tech-row-3col .colbox-center {
        width: 25.455%;
        padding-right: 40px;
        position: relative;
    }

    .tech-row-3col .colbox-right {
        width: 25.453%;
    }

    /* Titles */
    .tech-row-3col .title-box-category {
        font-family: "Merriweather", serif;
        font-size: 18px;
        line-height: 1.6;
        font-weight: bold;
        color: #222;
        margin-bottom: 12px;
        position: relative;
    }
    .tech-row-3col .title-box-category .parent-cate {
        float: left;
    }

    .tech-row-3col .title-box-category .sub-cate {
        float: left;
        margin-left: 16px;
        font-size: 13px;
        color: #4f4f4f;
        line-height: 1.15;
        font-family: arial;
        font-weight: 400;
        margin-top: 8px;
    }

    /* Item news */
    .tech-row-3col .item-news {
        width: 100%;
        float: left;
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #e5e5e5;
    }

    .tech-row-3col .item-news.full-thumb .thumb-art {
        width: 100%;
        margin-bottom: 10px;
    }

    .tech-row-3col .item-news .thumb-art {
        width: 260px;
        float: left;
        margin-right: 20px;
        position: relative;
    }

    .tech-row-3col .colbox-right .item-news .thumb-art {
        width: 100px;
        float: right;
        margin-left: 15px;
    }

    .tech-row-3col .item-news .title-news {
        font-family: "Merriweather", serif;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 4px;
    }

    .tech-row-3col .col-boxcate .item-news .title-news {
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 0;
    }

    .tech-row-3col .colbox-left .item-news .title-news {
        font-size: 24px;
        font-weight: normal;
    }

    .tech-row-3col .item-news .description {
        line-height: 1.4;
        font-size: 14px;
        color: #4f4f4f;
    }

    .tech-row-3col .colbox-left .item-news .description {
        font-size: 15px;
    }

    .tech-row-3col .col-boxcate .item-news .description {
        margin-top: 5px;
    }

    /* Thumb helper */
    .tech-row-3col .thumb {
        display: block;
        overflow: hidden;
        height: 0;
        width: 100%;
        background: #f4f4f4;
        position: relative;
    }

    .tech-row-3col .thumb-5x3 {
        padding-bottom: 60%;
    }

    /* Links & buttons */
    .tech-row-3col a {
        color: #0f0f0f;
        text-decoration: none;
    }

    .tech-row-3col button {
        border: none;
        outline: none;
        cursor: pointer;
    }

    /* Box category */
    .tech-row-3col .box-category {
        width: 100%;
        float: left;
        margin-bottom: 20px;
    }

    /* Slider */
    .tech-row-3col .section-khcn {
        width: 100%;
        padding: 0;
    }

    .tech-row-3col .all-swiper-wrapper {
        position: relative;
        overflow: hidden;
        width: 890px;
    }

    .tech-row-3col .swiper-wrapper {
        display: flex;
        width: max-content;
        overflow: hidden;
    }

    .tech-row-3col .section-khcn .swiper-wrapper .item-news {
        flex: 0 0 290px;
        margin-right: 20px;
        padding: 0;
        border: 0;
    }

    .tech-row-3col .section-khcn .swiper-wrapper .item-news .thumb-art {
        width: 100px;
        margin-right: 10px;
        float: left;
    }

    .tech-row-3col .section-khcn .swiper-wrapper .item-news .thumb {
        padding-bottom: 60%;
    }

    .tech-row-3col .section-khcn .swiper-wrapper .item-news .title-news {
        font-weight: 700;
        font-size: 15px;
        margin: 0;
        line-height: 1.6;
        font-family: "Merriweather", serif;
    }

    .tech-row-3col .section-khcn .swiper-wrapper .item-news .title-news a {
        color: #222;
        text-decoration: none;
    }

    /* Swiper buttons */
    .tech-row-3col .section-khcn .swiper-button-box {
        width: 30px;
        height: 30px;
        position: absolute;
        top: 50%;
        transform: translateY(-90%);
        background: #868686;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .tech-row-3col .section-khcn .swiper-button-next {
        right: 10px;
        z-index: 10;
    }

    .tech-row-3col .section-khcn .swiper-button-prev {
        left: 110px;
        z-index: 10;
    }

    .tech-row-3col .swiper-button-box.disabled {
        opacity: 0;
        pointer-events: none;
    }

    /* Slider title */
    .tech-row-3col .section-khcn .title {
        color: #726322;
        font-family: "Merriweather", serif;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.4;
        flex-shrink: 0;
    }

    .tech-row-3col .section-khcn .title span {
        font-size: 14px;
    }

    .tech-row-3col .section-khcn .title a {
        color: #726322;
        text-decoration: none;
    }
</style>

</style>

<script>
    const wrapper = document.querySelector('.section-khcn .swiper-wrapper');
    const itemWidth = 290; // chiều rộng mỗi item
    const visibleItems = 3; // số lượng item hiển thị cùng lúc
    const totalItems = wrapper.querySelectorAll('.item-news').length;

    let currentOffset = 0;
    const maxOffset = -(itemWidth * (totalItems - visibleItems));

    const nextBtn = document.querySelector('.section-khcn .swiper-button-next');
    const prevBtn = document.querySelector('.section-khcn .swiper-button-prev');

    function updateButtons() {
        nextBtn.disabled = currentOffset <= maxOffset;
        prevBtn.disabled = currentOffset >= 0;
        nextBtn.classList.toggle('disabled', nextBtn.disabled);
        prevBtn.classList.toggle('disabled', prevBtn.disabled);
    }

    nextBtn.addEventListener('click', () => {
        if (currentOffset > maxOffset) {
            currentOffset -= itemWidth;
            wrapper.style.transform = `translateX(${currentOffset}px)`;
            wrapper.style.transition = 'transform 0.3s ease';
            updateButtons();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentOffset < 0) {
            currentOffset += itemWidth;
            wrapper.style.transform = `translateX(${currentOffset}px)`;
            wrapper.style.transition = 'transform 0.3s ease';
            updateButtons();
        }
    });

    updateButtons();
</script>