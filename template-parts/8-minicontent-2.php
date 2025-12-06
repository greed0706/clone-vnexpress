<section>
    <?php
    /*
     * Title: mean of transport 3 row, 3 column
     * Slug: my-first-column
     * Categories: main-menu
     * Block Types: parrten\8-minicontent-2.php
     * Description: 1 bảng chứa các nội dung nhỏ
     */
    ?>


    <div class=" container d-flex row border-top pt-3 mt-3">
        <div class="col-left col-md-8 border-end pe-4 ">

            <!-- BOX: Spotlight -->
            <div class="box-spotlight">
                <div class="tilte ">
                    <h2 class="title fs-5 border-bottom border-dark d-inline-flex pb-1 fw-bolder">Spotlight</h2>
                </div>
                <?php
                $spotlight = new WP_Query([
                    'cat' => get_category_by_slug('thoi-su')->term_id, // thay bằng category cần spotlight
                    'posts_per_page' => 1
                ]);
                if ($spotlight->have_posts()):
                    while ($spotlight->have_posts()):
                        $spotlight->the_post();
                        $first_img = get_post_first_image();
                        ?>
                        <article class="item-news d-flex row">
                            <div class="thumb-art col-md-8 p-0">
                                <a href="<?php the_permalink(); ?>">
                                    <img class=" img-fluid object-fit-cover w-100 h-60" style=""
                                        src="<?php echo esc_url($first_img); ?>" alt="<?php the_title_attribute(); ?>">
                                </a>
                            </div>
                            <div class="content-text col-md-4 ps-3 p-2 pt-3" style="background-color: #F7F7F7;">
                                <h3 class="title-news  ">
                                    <a class="text-dark text-decoration-none fs-4"
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="description small text-muted ">
                                    <?php echo get_the_excerpt(); ?>
                                </p>

                                <p class="meta-news ps-3 pt-2">
                                    <a class="small text-muted text-decoration-none"
                                        href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>">
                                        <?php echo get_the_category()[0]->name; ?>
                                    </a>
                                </p>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

            <!-- BOX: Infographics -->
            <div class="box-category border-top border-bottom mb-2 pb-2 pt-2 mt-4">
                <h2 class="title fs-5 border-bottom border-dark d-inline-flex pb-1">Infographics</h2>
                <div class="content-box-category d-flex row">
                    <?php
                    $infographics = new WP_Query([
                        'cat' => get_category_by_slug('infographics')->term_id, // slug Infographics
                        'posts_per_page' => 2
                    ]);
                    if ($infographics->have_posts()):
                        while ($infographics->have_posts()):
                            $infographics->the_post();
                            $img = get_post_first_image(get_the_ID(), 'medium');
                            ?>
                            <article class="item-news col-md-6">
                                <div class="thumb-art">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if ($img): ?>
                                            <img class=" img-fluid object-fit-cover w-100 h-60" src="<?php echo esc_url($img); ?>"
                                                alt="<?php the_title(); ?>">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <h3><a class="text-dark text-decoration-none fs-6"
                                        href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </article>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>

            <!-- BOX: Xem nhiều -->
            <div class="box-xemnhieu d-flex flex-wrap align-items-center mt-2">
                <div class="w-100 mb-3  border-bottom">
                    <h2 class="title d-inline-flex  border-bottom fs-5 border-dark ">Xem nhiều</h2>
                </div>
                <?php
                $xemnhieu = new WP_Query([
                    'posts_per_page' => 8
                ]);
                $num = 1;
                if ($xemnhieu->have_posts()):
                    while ($xemnhieu->have_posts()):
                        $xemnhieu->the_post();
                        ?>
                        <article
                            class="item-news d-flex align-items-start col-12 col-md-6 mb-2 border-end border-bottom ps-3 pe-2  ">
                            <span class="number me-2 fs-1 fw-bold"><?php echo $num++; ?></span>
                            <h3 class="mb-0 align-self-center ">
                                <a class=" text-decoration-none text-dark" style="font-size: 14px;"
                                    href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

        </div>
        <div class="col-right col-md-4"></div>
    </div>
</section>

<style>
    a {
        transition: color 0.3s;
        font: arial;
    }

    a:hover {
        color: rgba(23, 66, 237, 0.67) !important;
    }
</style>