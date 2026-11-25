<?php
chdir(__DIR__);
require 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/post.php';

$post_ids = get_posts(array('post_type'=>'doctor','post_status'=>'any','posts_per_page'=>-1,'fields'=>'ids','s'=>'TEST'));
foreach ($post_ids as $post_id) {
    wp_delete_post($post_id, true);
}

foreach (array('doctor_specialty','doctor_governorate','doctor_area') as $taxonomy) {
    $terms = get_terms(array('taxonomy'=>$taxonomy,'hide_empty'=>false,'search'=>'TEST','fields'=>'all'));
    if (!is_wp_error($terms)) {
        foreach ($terms as $term) {
            wp_delete_term($term->term_id, $taxonomy);
        }
    }
}

foreach (get_posts(array('post_type'=>'attachment','post_status'=>'any','posts_per_page'=>-1,'s'=>'TEST')) as $attachment) {
    wp_delete_attachment($attachment->ID, true);
}

@unlink(ABSPATH . 'wp-content/uploads/test-doctor-profile-TEST.png');
