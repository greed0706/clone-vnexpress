<?php
/*
 * Title: top content 2 row, 3 column
 * Slug: my-first-column
 * Categories: main-menu
 * Block Types: parrten\1-top-content.php
 * Description: bảng nội dung về các nội dụng mới,là phần đầu tiên
 */
?>

<section class="section section_topstory ">
    <div class="container mt-4 mb-4" style=" margin: 0 auto; zoom: 0.9; ">
        <div class="row d-flex ">
            <!-- Cột trái: bài lớn + 2 bài nhỏ + Góc nhìn -->
            <div class="col-12 col-lg-8 ">
                <div class="row ">
                    <?php
                    $top_query = new WP_Query([
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ]);
                    $i = 0;
                    if ($top_query->have_posts()):
                        while ($top_query->have_posts()):
                            $top_query->the_post();
                            $i++;
                            $first_img = get_post_first_image();

                            if ($i == 1): ?>
                                <!-- Bài lớn -->
                                <div class="col-md-12 mb-4 border-bottom">
                                    <article class="item-news item-top-first row">
                                        <div class="thumb-art col-md-9 mb-3">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($first_img); ?>" class="img-fluid w-100"
                                                    alt="<?php the_title(); ?>">
                                            </a>
                                        </div>
                                        <div class="content col-md-3">
                                            <h2 class="h4 fw-bold text-dark">
                                                <a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            <p class="text-muted">
                                                <?php echo wp_trim_words(strip_tags(get_the_content()), 50, '...'); ?>
                                            </p>
                                        </div>
                                    </article>
                                </div>
                            <?php endif;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>

                    <!-- HÀNG CHUNG: 2 bài nhỏ + Góc nhìn -->
                    <div class="row border-bottom border-2 pe-2">
                        <?php
                        // Lấy lại 2 bài nhỏ (bỏ bài lớn)
                        $top_query = new WP_Query([
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        $i = 0;
                        if ($top_query->have_posts()):
                            while ($top_query->have_posts()):
                                $top_query->the_post();
                                $i++;
                                if ($i == 1)
                                    continue; // bỏ bài lớn
                                $first_img = get_post_first_image();
                                ?>
                                <div class="col-4 mb-4">
                                    <article class="item-news item-top-sub">
                                        <div class="thumb-art mb-2">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($first_img); ?>" class="img-fluid w-100"
                                                    alt="<?php the_title(); ?>">
                                            </a>
                                        </div>
                                        <h3 class="h6">
                                            <a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                    </article>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                        <!-- Góc nhìn -->
                        <?php
                        $gocnhin_query = new WP_Query([
                            'posts_per_page' => 1,
                            'category_name' => 'goc-nhin',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        ]);
                        if ($gocnhin_query->have_posts()):
                            while ($gocnhin_query->have_posts()):
                                $gocnhin_query->the_post(); ?>
                                <div class="col-4">
                                    <div class="co pb-3 p-2" style=" background-color: #F7F7F7; height: auto;">
                                        <div class="text-danger">Góc nhìn</div>
                                        <article class="item-news art-gocnhin pt-3">
                                            <h3 class="h6 fw-bold">
                                                <a class="text-dark text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                            <p class="text-muted">
                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                                            </p>
                                            <div class="d-flex flex-row-reverse align-items-center mt-2 gap-2">
                                                <div class="me-2 "><?php echo get_avatar(get_the_author_meta('ID'), 40); ?></div>
                                                <small  class="text-secondary"><?php the_author_posts_link(); ?></small>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>