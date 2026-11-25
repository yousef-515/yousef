<?php
chdir(__DIR__);
require 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$taxonomies = array(
    'doctor_specialty' => 'TEST Speciality',
    'doctor_governorate' => 'TEST Governorate',
    'doctor_area' => 'TEST Area',
);
$term_ids = array();
foreach ($taxonomies as $taxonomy => $name) {
    $term = term_exists($name, $taxonomy);
    if (!$term) {
        $term = wp_insert_term($name, $taxonomy);
    }
    $term_id = is_array($term) ? (int) $term['term_id'] : (int) $term;
    $term_ids[$taxonomy] = $term_id;
}

$post_id = wp_insert_post(array(
    'post_type' => 'doctor',
    'post_status' => 'publish',
    'post_title' => 'TEST Doctor Visual Review',
    'post_excerpt' => 'TEST summary: doctor profile visual review data.',
));
update_post_meta($post_id, '_tabibi_doctor_address', 'TEST Address 123');
update_post_meta($post_id, '_tabibi_doctor_phone', '+963900000001');
foreach ($term_ids as $taxonomy => $term_id) {
    wp_set_object_terms($post_id, $term_id, $taxonomy, false);
}

$upload = wp_upload_dir();
$image_path = trailingslashit($upload['path']) . 'test-doctor-profile-TEST.png';
file_put_contents($image_path, base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNk+A8AAQUBAScY42YAAAAASUVORK5CYII='));
$attachment_id = wp_insert_attachment(array(
    'post_mime_type' => 'image/png',
    'post_title' => 'TEST Doctor Profile',
    'post_status' => 'inherit',
), $image_path, $post_id);
if (!is_wp_error($attachment_id)) {
    wp_update_attachment_metadata($attachment_id, wp_generate_attachment_metadata($attachment_id, get_attached_file($attachment_id)));
    set_post_thumbnail($post_id, $attachment_id);
}

echo 'POST=' . $post_id . PHP_EOL;
echo 'ATTACHMENT=' . $attachment_id . PHP_EOL;
echo 'URL=' . get_permalink($post_id) . PHP_EOL;
