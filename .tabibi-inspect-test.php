<?php
chdir(__DIR__);
require 'wp-load.php';
header('Content-Type: text/plain; charset=utf-8');
echo "POSTS\n";
foreach (get_posts(array('post_type'=>'any','posts_per_page'=>50,'s'=>'TEST')) as $post) {
    echo $post->ID . '|' . $post->post_type . '|' . $post->post_status . '|' . $post->post_title . "\n";
}
$post_id = 14;
echo 'THUMB=' . get_post_thumbnail_id($post_id) . "\n";
$thumb = get_post_thumbnail_id($post_id);
if ($thumb) echo 'THUMB_URL=' . wp_get_attachment_url($thumb) . "\n";
foreach (array('doctor_specialty','doctor_governorate','doctor_area') as $tax) {
    $names = wp_get_post_terms($post_id, $tax, array('fields'=>'names'));
    echo $tax . '=' . (is_wp_error($names) ? 'ERROR' : implode(',', $names)) . "\n";
}
echo 'ADDRESS=' . get_post_meta($post_id, '_tabibi_doctor_address', true) . "\n";
echo 'PHONE=' . get_post_meta($post_id, '_tabibi_doctor_phone', true) . "\n";
