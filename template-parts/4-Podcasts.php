<?php
/*
 * Title: Postcard 2 row,1 container ,1 content
 * Slug: my-first-column
 * Categories: postcard
 * Block Types: parrten\4-Podcasts.php
 * Description: 1 bảng nội dung về postcard có 2 cột ngang, phần thứ 4 trình chiếu ở web.
 */
?>





<?php
$parent_slug = 'podcasts';
$parent_cat = get_category_by_slug($parent_slug);

if ($parent_cat):
    $child_cats = get_categories([
        'child_of' => $parent_cat->term_id,
        'hide_empty' => false,
    ]);

    $posts_query = new WP_Query([
        'posts_per_page' => 4,
        'category__in' => array_merge([$parent_cat->term_id], wp_list_pluck($child_cats, 'term_id')),
        'orderby' => 'date',
        'order' => 'DESC',
    ]);
    ?>
    <div class="container mt-4" style="zoom: 0.85;">
        <!-- Head title và child categories -->
        <div class="d-flex flex-wrap align-items-center mb-3">
            <h2 class="me-3 fw-bold border-bottom border-dark pb-1">
                <a href="<?php echo get_category_link($parent_cat->term_id); ?>" class="text-decoration-none text-dark">
                    <?php echo esc_html($parent_cat->name); ?>
                </a>
            </h2>
            <?php foreach ($child_cats as $child): ?>
                <a href="<?php echo get_category_link($child->term_id); ?>" class="me-2 small text-muted text-decoration-none">
                    <?php echo esc_html($child->name); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Grid podcast -->
        <div class="row g-3">
            <?php if ($posts_query->have_posts()): ?>
                <?php while ($posts_query->have_posts()):
                    $posts_query->the_post();
                    $first_img = get_post_first_image();
                    ?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="card h-100 border-0">
                            <a href="<?php the_permalink(); ?>" class="d-block ratio ratio-16x9 mb-2">
                                <img src="<?php echo esc_url($first_img); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                                    class="img-fluid object-fit-cover w-100 h-100">
                                <?php if ($duration): ?>
                                    <span class="position-absolute top-0 end-0 bg-dark text-white px-1 small rounded-bottom">
                                        <svg class="ic">
                                            <use xlink:href="#headset"></use>
                                        </svg>
                                        <?php echo esc_html($duration); ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                            <h3 class="h6 mb-0">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>