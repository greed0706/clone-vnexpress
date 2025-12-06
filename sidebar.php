<aside>
  <h3>Danh mục</h3>
  <ul>
    <?php wp_list_categories(['title_li' => '']); ?>
  </ul>

  <h3>Bài viết gần đây</h3>
  <ul>
    <?php wp_get_archives(['type' => 'postbypost', 'limit' => 5]); ?>
  </ul>
</aside>
