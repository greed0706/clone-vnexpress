<?php
/*
 * Template Part: Post Full Content
 * Hiển thị toàn bộ nội dung bài viết — không ảnh, không layout
 */
?>
<?php get_header(); ?>
<article>
    <section class="section top-header border-bottom">
        <?php get_template_part("template-parts/scroll-navigation") ?>
    </section>
    <section class="wrap-all-menu">
        <?php get_template_part("template-parts/wrap-all-menu") ?>
    </section>
    <!-- TITLE -->
    <div class="content " style="">

        <div class="container-post pt-4 pb-4 " >
            <div class="post-meta d-flex justify-content-between align-items-center"  >

                <!-- Breadcrumb -->
                <div class="breadcrumb">
                    <?php
                    $categories = get_the_category();
                    if (!empty($categories)) {

                        // Lấy category đầu tiên
                        $cat = $categories[0];

                        // Lấy category cha (nếu có)
                        if ($cat->category_parent) {
                            $parent = get_category($cat->category_parent);
                            echo '<a href="' . get_category_link($parent->term_id) . '">' . $parent->name . '</a>';
                            echo ' <span class="mx-2">›</span> ';
                        }

                        // Category hiện tại
                        echo '<a class="text-secondary"  href="">' . $cat->name . '</a>';
                    }
                    ?>
                </div>

                <!-- Ngày giờ -->
                <div class="post-date">
                    <?php echo get_the_date('l, j/n/Y, H:i (T)'); ?>
                </div>

            </div>

            <h2 class=" mb-3 fw-bold " style="font-family: 'Merriweather', serif;"><?php the_title(); ?></h2>

            <!-- FULL CONTENT -->
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</article>
<style>
    body {
        font-size: 14px;
        font-weight: 400;
        font-family: Arial, sans-serif !important;
        color: #1b1b1b;
        text-decoration: none;
    }

    .content {
        background-color: #FCFAF6;
    }

    .container-post {
        width: 100%;
        max-width: 680px;
        padding: 0 15px;
        margin: 0 auto;
        position: relative;
    }

    .container-post p {
        gap: 30px;
    }
    .container-post a {
        text-decoration: none;
        color: #1b1b1b;
    }
</style>

<?php get_footer(); ?>