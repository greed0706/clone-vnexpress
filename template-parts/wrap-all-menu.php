<div class="container-fluid p-0 bg-light justify-content-between align-items-center main-menu collapse wrap-all-menu border-bottom"
    id="collapseExample">
    <?php get_template_part('template-parts/svg-sprite'); ?>

    <!-- Header menu -->
    <div class="d-flex justify-content-between align-items-center p-3  border-bottom" style=" margin: 0 170px;">
        <span style="font-family: 'Merriweather', serif;" class="h5 mb-0">Tất cả chuyên mục</span>
        <a class="text-danger" data-bs-toggle="collapse" href="#collapseExample" title="Đóng">
            Đóng <span class="icon-close"></span>
        </a>
    </div>

    <!-- Content menu -->
    <div class="container-fluid p-0 main-menu border-end">
        <div class="row p-3  align-items-center w-85  " id="content-menu" style=" margin-left: 170px;">
            <!-- Cột trái: Category chính + subcategory -->
            <div class="col-8  mb-3 mb-md-0 overflow-auto " style="max-height: 700px;">
                <ul class="category-list list-unstyled d-flex row">
                    <?php
                    $categories = get_categories([
                        'parent' => 0,
                        'hide_empty' => false,
                        'orderby' => 'name',
                        'order' => 'ASC'
                    ]);

                    foreach ($categories as $cat) {
                        echo '<li class="category-item mb-4 col-2 ">';
                        echo '<a href="' . get_category_link($cat->term_id) . '" class="big-title fw-bold  d-block mb-1" >'
                            . esc_html($cat->name) . '</a>';

                        // Subcategories
                        $subcategories = get_categories([
                            'parent' => $cat->term_id,
                            'hide_empty' => false
                        ]);

                        if (!empty($subcategories)) {
                            echo '<div class="container-subcategory">';
                            echo '<ul  class="subcategory-list list-unstyled ps-1">';
                            foreach ($subcategories as $subcat) {
                                echo '<li class="subcategory-item pt-2">';
                                echo '<a href="' . get_category_link($subcat->term_id) . '" class="">'
                                    . esc_html($subcat->name) . '</a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                            echo '<span  class="toggle-btn text-secondary small border-top border-2">Xem thêm</span>';
                        }

                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
            <!-- Cột phải: Spotlight, link phụ, Liên hệ, Ứng dụng -->
            <div class="col-4  w-15 align-self-start " style="width: 160px; height: 700px;">

                <!-- Spotlight -->
                <ul class="list-unstyled mb-3 mt-1 mt-2 ">
                    <li class="mt-2"><a href="#" class="text-dark fw-bold ">Spotlight</a></li>
                    <li class="mt-2"><a href="#" class="text-dark fw-bold ">Ảnh</a></li>
                    <li class="mt-2"><a href="#" class="text-dark fw-bold ">Infographics</a></li>
                </ul>

                <!-- Mới nhất, Xem nhiều… -->
                <ul class="list-unstyled mb-3 border-top mt-2 pt-2">
                    <li class="mt-2"><a href="#" class="text-dark fw-bold">Mới nhất</a></li>
                    <li class="mt-2"><a href="#" class="text-dark fw-bold">Xem nhiều</a></li>
                    <li class="mt-2"><a href="#" class="text-dark fw-bold">Tin nóng</a></li>
                    <li class="mt-2"><a href="#" class="text-dark fw-bold">Lịch vạn niên</a></li>
                </ul>

                <!-- Link phụ -->
                <ul class="list-unstyled mb-3 border-top mt-2 pt-2">
                    <li class="mt-2"><a href="#" class="text-dark">Rao vặt</a></li>
                </ul>

                <!-- Liên hệ -->
                <div class="mt-4 border-top mt-2 pt-2">
                    <p class="fw-bold">Liên hệ</p>
                    <a href="#" class="d-block text-dark">
                        <svg class="ic ic-mail me-2" width="20" height="20">
                            <use xlink:href="#mail"></use>
                        </svg>
                        Tòa soạn
                    </a>
                </div>

                <!-- Tải ứng dụng -->
                <div class="mt-4 border-top mt-2 pt-2">
                    <p class="fw-bold">Tải ứng dụng</p>
                    <a href="#" class="d-block text-dark">
                        <svg class="ic ic-vne me-2" width="20" height="20">
                            <use xlink:href="#letter-E"></use>
                        </svg>
                        VnExpress
                    </a>
                    <a href="#" class="d-block text-dark">
                        <svg class="ic ic-vne me-2" width="20" height="20">
                            <use xlink:href="#letter-E"></use>
                        </svg>
                        International
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .wrap-all-menu a {
        font-size: 14px;
        font-weight: 400;
        font-family: Arial, sans-serif;
        color: #1b1b1b;
        text-decoration: none;
    }

    .wrap-all-menu .big-title {
        color: #b52759;
        text-decoration: none;
    }

    .wrap-all-menu a:hover {
        text-decoration: underline;
    }

    .wrap-all-menu .category-item {
        width: 173px;
        padding-right: 10px;

    }

    .wrap-all-menu .container-subcategory {
        max-height: 126px;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .toggle-btn {
        cursor: pointer;
        display: block;
        margin-top: 6px;
        font-size: 13px;
        color: #555;
        user-select: none;
    }
</style>

<script>
    document.querySelectorAll(".category-item").forEach(item => {
        const container = item.querySelector(".container-subcategory");
        const list = item.querySelector(".subcategory-list");
        const btn = item.querySelector(".toggle-btn");

        if (!container || !list || !btn) return;

        const count = list.querySelectorAll("li").length;

        // Nếu ít hơn hoặc bằng 4 item → ẩn nút
        if (count <= 4) {
            btn.style.display = "none";
            return;
        }

        let isOpen = false;

        // Giới hạn ban đầu
        container.style.maxHeight = "126px";

        btn.addEventListener("click", () => {
            if (!isOpen) {
                container.style.maxHeight = container.scrollHeight + "px";
                btn.style.display = "none";
            } else {
                container.style.maxHeight = "126px";
                btn.textContent = "Xem thêm";
            }
            isOpen = !isOpen;
        });
    });

</script>