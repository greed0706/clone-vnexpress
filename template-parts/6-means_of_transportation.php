<?php
/*
 * Title: mean of transport 3 row, 3 column
 * Slug: my-first-column
 * Categories: main-menu
 * Block Types: 6-means_of_transportation.php
 * Description: 1 bảng nội dung về các xe
 */
?>


<section class="section section_container mean-transport-3col" id="block_hv_xe">
    <div class="container has_border border-top border-2 mt-4">
        <?php
        $parent_cat = get_category_by_slug('xe');
        if ($parent_cat):
            $sub_cats = get_categories([
                'child_of' => $parent_cat->term_id,
                'hide_empty' => false
            ]);
            ?>
            <hgroup class="width_common title-box-category xe mt-4">
                <h2 class="parent-cate border-bottom border-2 border-black">
                    <a href="<?php echo get_category_link($parent_cat->term_id); ?>" class="inner-title"
                        title="<?php echo esc_attr($parent_cat->name); ?>">
                        <?php echo esc_html($parent_cat->name); ?>
                    </a>
                </h2>
                <?php foreach ($sub_cats as $sub): ?>
                    <span class="sub-cate">
                        <a class="text-secondary" href="<?php echo get_category_link($sub->term_id); ?>" title="<?php echo esc_attr($sub->name); ?>">
                            <?php echo esc_html($sub->name); ?>
                        </a>
                    </span>
                <?php endforeach; ?>
            </hgroup>
        <?php endif; ?>

        <div class="width_common section_box_cate flexbox">

            <!-- Cột trái -->
            <div class="col-boxcate colbox-left border-end me-2">
                <?php
                $left_posts = new WP_Query(['cat' => $parent_cat->term_id, 'posts_per_page' => 1]);
                if ($left_posts->have_posts()):
                    while ($left_posts->have_posts()):
                        $left_posts->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news full-thumb">
                            <div class="thumb-art">
                                <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url($first_img); ?>" class="" style="" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <div class="wrap-sum-news">
                                <h3 class="title-news">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="description">
                                    <a class=" text-secondary" href="<?php the_permalink(); ?>"><?php echo get_the_excerpt(); ?></a>
                                </p>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <!-- Cột giữa -->
            <div class="col-boxcate colbox-center  border-end ">
                <?php
                $center_posts = new WP_Query(['cat' => $parent_cat->term_id, 'posts_per_page' => 2, 'offset' => 1]);
                if ($center_posts->have_posts()):
                    while ($center_posts->have_posts()):
                        $center_posts->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news full-thumb">
                            <div class="thumb-art">
                                <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url($first_img); ?>" class="" style=" "
                                        alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <h3 class="title-news">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <!-- Cột phải -->
            <div class="col-boxcate colbox-right ps-2">
                <div class="box-search-car box-search-car-2 box-category">
                    <div class="box-search-car box-search-car-2 box-category">
                        <ul class="tab">
                            <li class="v-car active menu-tracuu-xe" data-type="vcar">
                                <a href="javascript:;" title="V-car"><img
                                        src="https://s4.vnecdn.net/vnexpress/restruct/i/v9744/v2_2019/pc/graphics/ico-vcar.svg"
                                        alt="V-car">V-car</a>
                            </li>
                            <li class="v-bike menu-tracuu-xe" data-type="vbike">
                                <a href="javascript:;" title="V-Bike"><img
                                        src="https://s4.vnecdn.net/vnexpress/restruct/i/v9744/v2_2019/pc/graphics/ico-vbike.svg"
                                        alt="V-Bike">V-Bike</a>
                            </li>
                        </ul>
                        <div class="form-search">
                            <input type="search" class="input_search input_tracuu_xe" data-type="vcar" name="keyword"
                                autocomplete="off" value="" placeholder="Nhập tên xe cần tìm">
                            <button type="submit" class="icon_seach_web">
                                <svg class="ic">
                                    <use xlink:href="#Search"></use>
                                </svg>
                            </button>
                            <button type="reset" class="btn_reset">
                                <svg class="ic">
                                    <use xlink:href="#Close"></use>
                                </svg>
                            </button>
                            <div class="suggest-search">
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $right_posts = new WP_Query(['cat' => $parent_cat->term_id, 'posts_per_page' => 2, 'offset' => 3]);
                if ($right_posts->have_posts()):
                    while ($right_posts->have_posts()):
                        $right_posts->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news full-thumb">
                            <div class="thumb-art">
                                <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url($first_img); ?>" class="" style="" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <h3 class="title-news">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</section>

<style>
    .mean-transport-3col .section,
    .mean-transport-3col .width_common,
    .mean-transport-3col .box-category,
    .mean-transport-3col .item-news {
        width: 100%;
        float: left;
    }

    .mean-transport-3col .section {
        float: left;
    }

    .mean-transport-3col .has_border {
        margin-top: 20px;
        padding-top: 20px;
    }

    .mean-transport-3col .container {
        max-width: auto;
        padding: 0 15px;
        margin: 0 auto;
        position: relative;
    }

    .mean-transport-3col .container::after {
        content: "";
        display: block;
        clear: both;
    }

    .mean-transport-3col .title-box-category {
        display: block;
        position: relative;
        font: bold 18px/1.6 "Merriweather", serif;
        margin-bottom: 12px;
        color: #222;
    }

    .mean-transport-3col .title-box-category .parent-cate {
        float: left;
    }

    .mean-transport-3col .title-box-category .sub-cate {
        float: left;
        margin-left: 16px;
        margin-top: 8px;
        font: 400 13px/1.15 arial;
        color: #4f4f4f;
    }

    .mean-transport-3col h1,
    .mean-transport-3col h2,
    .mean-transport-3col h3,
    .mean-transport-3col h4,
    .mean-transport-3col h5,
    .mean-transport-3col h6 {
        line-height: inherit;
        font-size: inherit;
        font-weight: inherit;
    }

    .mean-transport-3col .flexbox {
        display: flex;
    }

    .mean-transport-3col .section_box_cate {
        flex-wrap: wrap;
    }

    .mean-transport-3col .colbox-left {
        width: 49.092%;
        padding-right: 10px;
        position: relative;
    }

    .mean-transport-3col .colbox-center {
        width: 25.455%;
        padding-right: 10px;
        position: relative;
    }

    .mean-transport-3col .colbox-right {
        width: 23.453%;
    }

    .mean-transport-3col .col-boxcate .item-news:last-of-type {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .mean-transport-3col .item-news {
        padding-bottom: 15px;
        margin-bottom: 15px;
        border-bottom: 1px solid #e5e5e5;
    }

    .mean-transport-3col .item-news.full-thumb .thumb-art {
        width: 100%;
        margin: 0 0 10px;
    }

    .mean-transport-3col .item-news .thumb-art {
        width: 260px;
        float: left;
        margin-right: 20px;
    }

    .mean-transport-3col .colbox-right .item-news .thumb-art {
        width: 100px;
        float: right;
        margin-left: 15px;
    }

    .mean-transport-3col .thumb-5x3 {
        padding-bottom: 60%;
    }

    .mean-transport-3col .thumb {
        display: block;
        overflow: hidden;
        height: 0;
        position: relative;
        width: 100%;
        background: #f4f4f4;
    }

    .mean-transport-3col .thumb-art {
        position: relative;
    }

    .mean-transport-3col a {
        color: #0f0f0f;
        text-decoration: none;
        outline: 1;
    }

    .mean-transport-3col .item-news .title-news {
        font: 14px/160% "Merriweather", serif;
        margin-bottom: 4px;
    }

    .mean-transport-3col .colbox-left .item-news .title-news {
        font-size: 24px;
        font-weight: normal;
    }

    .mean-transport-3col .col-boxcate .item-news .title-news {
        font-weight: bold;
        font-size: 15px;
        margin-bottom: 0;
    }

    .mean-transport-3col .item-news .description {
        font-size: 14px;
        line-height: 140%;
        color: #4f4f4f;
    }

    .mean-transport-3col .colbox-left .item-news .description {
        font-size: 15px;
    }

    .mean-transport-3col .col-boxcate .item-news .description {
        margin-top: 5px;
    }

    /* Box search car & filter */
    .mean-transport-3col .box-search-car,
    .mean-transport-3col .filter-tuyensinh {
        background: #d6edfa;
        border-radius: 3px;
        padding: 42px 15px 15px;
        position: relative;
    }

    .mean-transport-3col .box-search-car.box-search-car-2,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 {
        background: #f7f7f7;
        border: 1px solid #e5e5e5;
        border-radius: 4px;
        padding: 15px !important;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .tab,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .tab {
        display: flex;
        width: 100%;
        border-bottom: 1px solid #e5e5e5;
        margin-bottom: 15px;
    }

    .mean-transport-3col ul,
    .mean-transport-3col li {
        list-style: none;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .tab li,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .tab li {
        width: 50%;
        border-bottom: 3px solid transparent;
        padding: 0 5px 15px;
        text-align: center;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .tab li.active.v-car,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .tab li.active.v-car {
        border-bottom-color: #0095e6;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .tab li a,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .tab li a {
        font: 400 14px/100% arial;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #9f9f9f;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .tab li.active.v-car a,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .tab li.active.v-car a {
        font-weight: bold;
        color: #0095e6;
    }

    .mean-transport-3col .box-search-car .form-search,
    .mean-transport-3col .filter-tuyensinh .form-search {
        position: relative;
    }

    .mean-transport-3col .box-search-car .form-search .input_search,
    .mean-transport-3col .box-search-car .form-search .input_search_tuyensinh,
    .mean-transport-3col .filter-tuyensinh .form-search .input_search,
    .mean-transport-3col .filter-tuyensinh .form-search .input_search_tuyensinh {
        background: #fff;
        border: 0;
        border-radius: 3px;
        height: 40px;
        padding: 0 40px 0 10px;
        font-size: 14px;
        width: 100%;
        outline: 0;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .form-search .input_search,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .form-search .input_search {
        border: 1px solid #e5e5e5;
        border-radius: 4px;
        padding: 0 10px 0 40px;
    }

    .mean-transport-3col .box-search-car .form-search .icon_seach_web,
    .mean-transport-3col .filter-tuyensinh .form-search .icon_seach_web {
        position: absolute;
        background: none;
        width: 40px;
        height: 40px;
        border: 0;
        right: 1px;
        top: 0;
        color: #222;
        cursor: pointer;
    }

    .mean-transport-3col .box-search-car.box-search-car-2 .form-search .icon_seach_web,
    .mean-transport-3col .box-search-car.box-search-car-2 .form-search .btn_reset,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .form-search .icon_seach_web,
    .mean-transport-3col .filter-tuyensinh.box-search-car-2 .form-search .btn_reset {
        left: 1px;
    }

    .mean-transport-3col button {
        border: none;
        outline: none;
        cursor: pointer;
    }
</style>