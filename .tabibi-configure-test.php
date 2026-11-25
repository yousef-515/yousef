<?php
chdir(__DIR__);
require 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
$post_id = 14;
wp_update_post(array('ID' => $post_id, 'post_status' => 'publish', 'post_title' => 'TEST Doctor Visual Review', 'post_excerpt' => 'TEST summary: doctor profile visual review data.'));
update_post_meta($post_id, '_tabibi_doctor_address', 'TEST Address 123');
update_post_meta($post_id, '_tabibi_doctor_phone', '+963900000001');
foreach(array('doctor_specialty'=>'TEST Speciality','doctor_governorate'=>'TEST Governorate','doctor_area'=>'TEST Area') as $taxonomy=>$name){$term=term_exists($name,$taxonomy);if(!$term){$term=wp_insert_term($name,$taxonomy);} $term_id=is_array($term)?(int)$term['term_id']:(int)$term;wp_set_object_terms($post_id,$term_id,$taxonomy,false);}
$path=ABSPATH.'wp-content/uploads/test-doctor-profile-TEST.png';if(file_exists($path)){$attachment_id=wp_insert_attachment(array('post_mime_type'=>'image/png','post_title'=>'TEST Doctor Profile','post_status'=>'inherit'),$path,$post_id);if(!is_wp_error($attachment_id)){wp_generate_attachment_metadata($attachment_id,get_attached_file($attachment_id));set_post_thumbnail($post_id,$attachment_id);}}
echo get_permalink($post_id);
