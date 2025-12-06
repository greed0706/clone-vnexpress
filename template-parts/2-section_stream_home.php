<?php
/*
 * Title: Section Stream Home 20 row, 2 column
 * Slug: my-first-column
 * Categories: main-menu
 * Block Types: pattern/2-section_stream_home.php
 * Description: 20 bài mới bên trái, và bài theo chuyên mục bên phải
 */
?>

<section class="section section_stream_home py-4 me-5 " style="">
    <div class="container" style=" margin: 0 260px; width: auto;">
        <div class="row gx-4 align-items-start  ">

            <!-- ================= LEFT COLUMN ================= -->
            <div class="col-5 col-md-4 border-end border-3 " style="zoom: 0.8;" >
                <?php
                $next_posts = new WP_Query([
                    'posts_per_page' => 20,
                    'offset' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ]);

                if ($next_posts->have_posts()):
                    while ($next_posts->have_posts()):
                        $next_posts->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news mb-0 border-bottom p-2 border-1" itemscope
                            itemtype="https://schema.org/NewsArticle">
                            <h3 class="h6 fw-bold mb-2" itemprop="headline">
                                <a href="<?php the_permalink(); ?>" class="text-dark" style="text-decoration: none;" >
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <div class="d-flex">
                                <div class="thumb-art mb-2">
                                    <a href="<?php the_permalink(); ?>" class="d-block">
                                        <img src="<?php echo esc_url($first_img); ?>" class="" style="height: 90px; width: 150px;"
                                            alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                                <div class="ps-3">
                                    <p class="description small text-muted mb-1" itemprop="description">
                                        <a href="<?php the_permalink(); ?>" class="text-muted" style="text-decoration: none;">
                                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                        </a>
                                    </p>
                                    <time datetime="<?php echo get_the_date('c'); ?>" class="small text-secondary"
                                        itemprop="datePublished">
                                        <?php echo get_the_date('d/m/Y'); ?>
                                    </time>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; endif;
                wp_reset_postdata(); ?>
            </div>

            <!-- ================= RIGHT COLUMN ================= -->
            <div class="col-7 col-md-8 content-box-category ps-4 " style=" zoom:0.8; width: auto;" >
                <?php
                $parent_categories = ['kinh-doanh', 'the-thao', 'bat-dong-san', 'giai-tri', 'suc-khoe', 'doi-song', 'giao-duc','du-lich','the-gioi','thu-gian'];

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
                    <div class="box-category mb-2  pt-2 border-top border-2" id="<?php echo esc_attr($parent_slug); ?>" style="width: 700;">
                        <div class="d-flex flex-wrap align-items-center mb-3" style=" width:auto;">
                            <h2 class="h5 fw-bold me-3">
                                <a href="<?php echo get_category_link($parent_cat->term_id); ?>" class="text-dark"
                                    style="">
                                    <?php echo esc_html($parent_cat->name); ?>
                                </a>
                            </h2>
                            <?php foreach (array_slice($child_cats, 0, 6) as $child): ?>
                                <span class="me-2 small">
                                    <a href="<?php echo get_category_link($child->term_id); ?>" class="text-secondary"
                                        style="text-decoration: none;">
                                        <?php echo esc_html($child->name); ?>
                                    </a>
                                </span>
                            <?php endforeach; ?>

                        </div>

                        <div class="content-box-category ">

                            <?php if ($cat_posts->have_posts()):
                                $i = 0;

                                // Mở group ITEM 1 + ITEM 2
                                echo '<div class="d-flex row" >';

                                while ($cat_posts->have_posts()):
                                    $cat_posts->the_post();
                                    $i++;
                                    $first_img = get_post_first_image();
                                    ?>

                                    <?php if ($i === 1): ?>
                                        <!-- ITEM 01 -->
                                        <article class="d-flex mb-3 border-end border-1 col-8 row me-1 "  style=" max-width: 500px;">
                                            <div class=" thumb-art col-6  " style="width: auto;">
                                                <a href="<?php the_permalink(); ?>" class="d-block" style="text-decoration: none;">
                                                    <img src="<?php echo esc_url($first_img); ?>" class="" style=" width: 200px; height: 130px;"
                                                        alt="<?php the_title(); ?>">
                                                </a>
                                            </div>
                                            <div class=" col-6 " >
                                                <h3 class="h6 fw-bold mb-2 ps-2 ">
                                                    <a href="<?php the_permalink(); ?>" class="text-dark"
                                                        style="text-decoration: none;"><?php the_title(); ?></a>
                                                </h3>
                                                <p class="small text-muted ps-2">
                                                    <a href="<?php the_permalink(); ?>" class="text-muted"
                                                        style="text-decoration: none;">
                                                        <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </article>

                                    <?php elseif ($i === 2): ?>
                                        <!-- ITEM 02 -->
                                        <article class="mb-2 col-4">
                                            <h3 class="h6 fw-bold">
                                                <a href="<?php the_permalink(); ?>" class="text-dark"
                                                    style="text-decoration: none;"><?php the_title(); ?></a>
                                            </h3>
                                            <p class="small text-muted">
                                                <a href="<?php the_permalink(); ?>" class="text-muted" style="text-decoration: none;">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                                </a>
                                            </p>
                                        </article>

                                        <?php
                                        // Đóng group sau ITEM 2
                                        echo '</div>';  // đóng .group-item-1-2
                                        ?>

                                    <?php else: ?>
                                        <!-- ITEM 03–05 -->
                                        <?php if ($i === 3)
                                            echo '<ul class="row border-top border-2 ms-3 mb-0  ps-1">'; ?>

                                        <li class="col-12 col-md-4 pe-2 ps-0 mt-2" style=" max-width: 215px;">
                                            <article>
                                                <h3 class="h6">
                                                    <a href="<?php the_permalink(); ?>" class="text-dark" style="text-decoration: none;">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </article>
                                        </li>

                                        <?php if ($i === 5)
                                            echo '</ul>'; ?>

                                    <?php endif; ?>

                                <?php endwhile;
                                wp_reset_postdata();
                            endif; ?>

                        </div>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>