<section class="w-100 ">
    <div class="container row   ">
        <?php
        $parent_categories = ['tam-su', 'thu-gian'];

        foreach ($parent_categories as $parent_slug):
            $parent_cat = get_category_by_slug($parent_slug);
            if (!$parent_cat)
                continue;

            $child_cats = get_categories([
                'child_of' => $parent_cat->term_id,
                'hide_empty' => false,
            ]);

            $cat_posts = new WP_Query([
                'posts_per_page' => 5,
                'category__in' => array_merge([$parent_cat->term_id], wp_list_pluck($child_cats, 'term_id')),
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            ?>

            <div class="item-box-cate box-last col-4 border-end border-2 pe-2 ps-2 " id="block_<?php echo esc_attr($parent_slug); ?>">
                <div class="box-category box-cate-featured box-cate-featured-vertical">
                    <hgroup
                        class="width_common title-box-category d-flex align-items-center gap-2 <?php echo esc_attr($parent_slug); ?>">
                        <h2 class="fs-5 parent-cate me-1 fw-bold border-bottom border-dark pb-1">
                            <a href="<?php echo get_category_link($parent_cat->term_id); ?>"
                                class="inner-title text-decoration-none text-dark">
                                <?php echo esc_html($parent_cat->name); ?>
                            </a>
                        </h2>
                        <?php foreach ($child_cats as $child): ?>
                            <span class="sub-cate">
                                <a class="me-2 text-decoration-none small text-muted"
                                    href="<?php echo get_category_link($child->term_id); ?>">
                                    <?php echo esc_html($child->name); ?>
                                </a>
                            </span>
                        <?php endforeach; ?>
                    </hgroup>

                    <div class="width_common content-box-category">
                        <?php
                        $i = 0;
                        if ($cat_posts->have_posts()):
                            while ($cat_posts->have_posts()):
                                $cat_posts->the_post();
                                $i++;
                                $first_img = get_post_first_image();
                                if ($i == 1): ?>
                                    <!-- Bài lớn -->
                                    <article class="item-news full-thumb border-bottom ">
                                        <div class="thumb-art">
                                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                                <img class=" img-fluid object-fit-cover w-100 h-60" style="max-height:206px"
                                                    src="<?php echo esc_url($first_img); ?>" alt="<?php the_title_attribute(); ?>">
                                            </a>
                                        </div>
                                        <div class="width_common box-info-news">
                                            <h3 class="title-news">
                                                <a class="fw-bolder" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <p class="description">
                                                <a class="text-decoration-none small text-muted" href="<?php the_permalink(); ?>">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 25); ?>
                                                </a>
                                            </p>
                                        </div>
                                    </article>
                                <?php else: ?>
                                    <!-- Các bài nhỏ -->
                                    <div class="item-news d-flex align-items-center flex-nowrap  border-bottom">
                                        <div class="list me-2 "></div>
                                        <h3 class="title-news mt-2">
                                            <a class="fw-bolder" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                    </div>
                                <?php endif;
                            endwhile;
                            wp_reset_postdata();
                        endif; ?>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>

<style>
    section {
        display: block;
        unicode-bidi: isolate;
    }

    .container {
        width: 100%;
        max-width: 1130px;
        padding: 0 15px;
        margin: 0 auto;
        position: relative;
    }

    .list {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        content: "";
        background: #bdbdbd;
    }
</style>