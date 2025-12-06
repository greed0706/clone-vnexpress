<?php
/**
 * Hàm lấy ảnh Featured Image hoặc ảnh đầu tiên trong post content
 *
 * @param int $post_id ID của bài viết
 * @param string $default_image URL ảnh mặc định nếu không có ảnh
 * @return string URL của ảnh
 */
function get_post_first_image($post_id = 0, $default_image = '')
{
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    // 1. Lấy featured image trước
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, 'full');
    }

    // 2. Lấy tất cả ảnh trong content
    $post_content = get_post_field('post_content', $post_id);
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post_content, $matches);

    if (!empty($matches[1][0])) {
        // lấy ảnh đầu tiên tìm thấy trong toàn bộ content
        return $matches[1][0];
    }

    // 3. Nếu không có ảnh, trả về ảnh mặc định
    return $default_image ?: '';
}

