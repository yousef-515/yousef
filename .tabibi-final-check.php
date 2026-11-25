<?php
chdir(__DIR__);
require 'wp-load.php';
header('Content-Type: text/plain; charset=utf-8');
global $wpdb;
$post_count = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_title LIKE '%TEST%' OR post_content LIKE '%TEST%' OR post_excerpt LIKE '%TEST%' OR guid LIKE '%TEST%'");
$meta_count = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->postmeta WHERE meta_key LIKE '%tabibi_doctor%' OR meta_value LIKE '%TEST%'");
$term_count = 0;
foreach (array('doctor_specialty','doctor_governorate','doctor_area') as $taxonomy) {
    $term_count += (int) $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->terms t INNER JOIN $wpdb->term_taxonomy tt ON tt.term_id=t.term_id WHERE tt.taxonomy=%s AND t.name LIKE %s", $taxonomy, '%TEST%'));
}
$image_present = file_exists(ABSPATH . 'wp-content/uploads/test-doctor-profile-TEST.png') ? 'present' : 'absent';
echo 'TEST_POSTS=' . $post_count . PHP_EOL;
echo 'TEST_META=' . $meta_count . PHP_EOL;
echo 'TEST_TERMS=' . $term_count . PHP_EOL;
echo 'TEST_IMAGE=' . $image_present . PHP_EOL;
