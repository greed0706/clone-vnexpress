<?php get_header(); ?>

<main>
  <section class="section top-header border-bottom">
    <?php get_template_part("template-parts/scroll-navigation") ?>
  </section>
  <section class="wrap-all-menu">
    <?php get_template_part("template-parts\wrap-all-menu") ?>
  </section>
  <section class="section section_topstory">
    <?php get_template_part("template-parts/1-top-content"); ?>
  </section>
  <section class="section section_stream_home section_container">
    <?php get_template_part("template-parts/2-section_stream_home") ?>
  </section>
  <section class="section section_khcn mt20 section_khcn_v2">
    <?php get_template_part("template-parts/3-technolagy") ?>
  </section>
  <section class="section section_container section_video section_video_home section_video_home_v2">
    <?php get_template_part("template-parts/4-Podcasts") ?>
  </section>
  <section class="section section_container">
    <?php get_template_part("template-parts/5-mini_content") ?>
  </section>
  <section class="section section_6-means_of_transportation">
    <?php get_template_part("template-parts/6-means_of_transportation") ?>
  </section>
  <section class="section section_7-travel">
    <?php get_template_part("template-parts/7-travel") ?>
  </section>
  <section class="">
    <?php get_template_part("template-parts/mini-content") ?>
  </section>
  <section class="section section_container">
    <?php get_template_part("template-parts/8-minicontent-2") ?>
  </section>
</main>
<style>
  body{
    font-size: 14px;
        font-weight: 400;
        font-family: Arial, sans-serif !important;
        color: #1b1b1b;
        text-decoration: none;
  }
</style>

<?php get_footer(); ?>