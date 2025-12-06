<hr>

<footer>
  <div class="container">
    <div class="row inner-footer border-top border-4 pt-2">

      <!-- Menu động chiếm full width -->
      <div class="col-7 mb-3 border-end ">
        <?php
        $categories = get_categories([
          'hide_empty' => false,
          'parent' => 0,
        ]);
        if (!empty($categories)) {
          $chunked = array_chunk($categories, 6);
        }
        ?>
        <?php if (!empty($chunked)): ?>
          <div class="row d-flex w-auto">
            <div class="col-12 col-md-3 mb-3">
              <ul class="list-menu-footer list-unstyled">
                <li class="item-menu mb-2"><a class="text-dark text-decoration-none" href="">Trang chủ</a></li>
                <li class="item-menu mb-2"><a class="text-dark text-decoration-none" href="">Ảnh</a></li>
                <li class="item-menu mb-2"><a class="text-dark text-decoration-none" href="">Infographics</a></li>
              </ul>
            </div>
            <?php foreach ($chunked as $group): ?>

              <div class="col-12 col-md-3 mb-3 ">

                <ul class="list-unstyled">
                  <?php foreach ($group as $cat): ?>
                    <li class="mb-2">
                      <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
                        class="text-decoration-none text-dark">
                        <?php echo esc_html($cat->name); ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Menu cố định -->
      <div class="col-md-2 mb-3 border-end">
        <ul class="list-menu-footer list-unstyled border-bottom gap-2 mt-3 pb-3">
          <li class="item-menu mt-2 "><a class="text-decoration-none text-dark" href="">Mới nhất</a></li>
          <li class="item-menu mt-2 "><a class="text-decoration-none text-dark" href="">Xem nhiều</a></li>
          <li class="item-menu mt-2 "><a class="text-decoration-none text-dark" href="">Tin nóng</a></li>
        </ul>
        <ul class="list-menu-footer list-unstyled gap-2 ">
          <li class="item-menu mt-2 "><a class="text-decoration-none text-dark" href="">Newsletter</a></li>
          <li class="item-menu mt-2 "><a class="text-decoration-none text-dark" href="">Lịch vạn niên</a></li>
          <li class="item-menu mt-2 "><a class="text-decoration-none text-dark" href="">Rao vặt</a></li>
        </ul>
      </div>

      <!-- Liên hệ / tải app / hotline -->
      <div class="col-md-3 mb-3">
        <div class="contact downloadapp  mt-2">
          <p class="m-0 ">Tải ứng dụng</p>
          <div class="d-flex  gap-2 w-auto mt-2 ">
            <a style=" background-color:  #f7f7f7;" class="gap-3 button border text-decoration-none text-dark" href=" " class="app_vne">
              <svg class="ic ic-evne" width="16" height="16">
                <use href="#letter-E"></use>
              </svg>VnExpress</a>
            <a style=" background-color:  #f7f7f7;" class="gap-3 button border text-decoration-none text-dark" href=" " class="app_evne">
              <svg class="ic ic-evne p-3" width="16" height="16">
                <use href="#letter-E"></use>
              </svg>
              International</a>
          </div>
        </div>
        <div class="contact">
          <p class="m-0 mt-2">Liên hệ</p>
          <a class="gap-3 text-decoration-none text-dark mt-2" href="" class="mail">
            <svg class="ic ic-evne " width="16" height="16">
              <use href="#mail"></use>
            </svg>Tòa soạn</a>
        </div>
        <div class="hotline">
          <p class="mt-2">Đường dây nóng</p>
          <div class="left">
            <strong>083.888.0123</strong>
            <p>(Hà Nội)</p>
          </div>
          <div class="right">
            <strong>082.233.3555</strong>
            <p>(TP. Hồ Chí Minh)</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</footer>

<style>
  .button{
    transition: color 0.3s;
  }
  .button:hover{
    background-color: #e5e5e5;
  }
</style>
<!-- Bootstrap JS (kèm Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php wp_footer(); ?>
</body>

</html>