<?php
chdir(__DIR__);
require 'wp-load.php';
header('Content-Type: text/plain; charset=utf-8');
global $wpdb;
$posts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_title LIKE '%TEST%' OR post_content LIKE '%TEST%' OR post_excerpt LIKE '%TEST%'");
$meta = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->postmeta WHERE meta_key LIKE '%tabibi_doctor%' OR meta_value LIKE '%TEST%'");
$attachments = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='attachment' AND (post_title LIKE '%TEST%' OR guid LIKE '%TEST%')");
$terms = 0;
foreach (array('doctor_specialty','doctor_governorate','doctor_area') as $taxonomy) {
    $terms += (int) $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->terms t INNER JOIN $wpdb->term_taxonomy tt ON tt.term_id=t.term_id WHERE tt.taxonomy=%s AND t.name LIKE %s", $taxonomy, '%TEST%'));
}
echo 'TEST_POSTS=' . $posts . PHP_EOL;
echo 'TEST_META=' . $meta . PHP_EOL;
echo 'TEST_ATTACHMENTS=' . $attachments . PHP_EOL;
echo 'TEST_TERMS=' . $terms . PHP_EOL;
echo 'TEST_IMAGE=' . (file_exists(ABSPATH . 'wp-content/uploads/test-doctor-profile-TEST.png') ? 'present' : 'absent') . PHP_EOL;
