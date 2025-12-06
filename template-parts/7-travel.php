<?php
/*
 * Title: mean of transport 3 row, 3 column
 * Slug: my-first-column
 * Categories: main-menu
 * Block Types: parrten\7-travel.php
 * Description: 1 bảng nội dung về các du lịch
 */
?>

<section class="section section_container mean-transport-3col" id="block_hv_dulich">
    <div class="container has_border border-top border-2 mt-4 pt-3 border-bottom mb-5 pb-5">
        <?php
        // Lấy category chính (Du lịch)
        $parent_cat = get_category_by_slug('du-lich');
        if ($parent_cat):
            // Lấy subcategories
            $sub_cats = get_categories([
                'child_of' => $parent_cat->term_id,
                'hide_empty' => false
            ]);
            ?>
            <hgroup class="width_common title-box-category dulich ">
                <h2 class="parent-cate border-bottom border-2 border-black">
                    <a href="<?php echo get_category_link($parent_cat->term_id); ?>" class="inner-title"
                        title="<?php echo esc_attr($parent_cat->name); ?>">
                        <?php echo esc_html($parent_cat->name); ?>
                    </a>
                </h2>
                <?php foreach ($sub_cats as $sub): ?>
                    <span class="sub-cate">
                        <a href="<?php echo get_category_link($sub->term_id); ?>" title="<?php echo esc_attr($sub->name); ?>">
                            <?php echo esc_html($sub->name); ?>
                        </a>
                    </span>
                <?php endforeach; ?>
            </hgroup>
        <?php endif; ?>

        <div class="width_common section_box_cate flexbox">
            <!-- Cột trái: bài nổi bật đầu tiên -->
            <div class="col-boxcate colbox-left border-end pe-2">
                <?php
                $left_posts = new WP_Query([
                    'cat' => $parent_cat->term_id,
                    'posts_per_page' => 1
                ]);
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
                                    <a class="text-secondary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="description">
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <!-- Cột giữa: 2 bài tiếp theo -->
            <div class="col-boxcate colbox-center ps-3 border-end">
                <?php
                $center_posts = new WP_Query([
                    'cat' => $parent_cat->term_id,
                    'posts_per_page' => 2,
                    'offset' => 1
                ]);
                if ($center_posts->have_posts()):
                    while ($center_posts->have_posts()):
                        $center_posts->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news full-thumb">
                            <div class="thumb-art">
                                <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url($first_img); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <h3 class="title-news">
                                <a class="text-secondary" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <!-- Cột phải: 3 bài còn lại -->
            <div class="col-boxcate colbox-right ps-2">
                <?php
                $right_posts = new WP_Query([
                    'cat' => $parent_cat->term_id,
                    'posts_per_page' => 3,
                    'offset' => 3
                ]);
                if ($right_posts->have_posts()):
                    while ($right_posts->have_posts()):
                        $right_posts->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news full-thumb">
                            <div class="thumb-art">
                                <a href="<?php the_permalink(); ?>" class="thumb thumb-5x3" title="<?php the_title(); ?>">
                                    <img src="<?php echo esc_url($first_img); ?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <h3 class="title-news">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </div>
</section>