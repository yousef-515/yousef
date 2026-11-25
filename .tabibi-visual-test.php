<?php
chdir(__DIR__);
require 'wp-load.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

$post_id = 14;
wp_update_post(array('ID'=>$post_id,'post_type'=>'doctor','post_status'=>'publish','post_title'=>'TEST Doctor Visual Review','post_excerpt'=>'TEST summary: doctor profile visual review data.'));
update_post_meta($post_id,'_tabibi_doctor_address','TEST Address 123');
update_post_meta($post_id,'_tabibi_doctor_phone','+963900000001');

foreach(array('doctor_specialty'=>'TEST Speciality','doctor_governorate'=>'TEST Governorate','doctor_area'=>'TEST Area') as $taxonomy=>$name){
  $term=term_exists($name,$taxonomy); if(!$term){$term=wp_insert_term($name,$taxonomy);} $term_id=is_array($term)?(int)$term['term_id']:(int)$term; wp_set_object_terms($post_id,$term_id,$taxonomy,false);
}

$path=ABSPATH.'wp-content/uploads/test-doctor-profile-TEST.png';
if(file_exists($path)){
  $attach_id=wp_insert_attachment(array('post_mime_type'=>'image/png','post_title'=>'TEST Doctor Profile','post_status'=>'inherit'),$path,$post_id);
  if(!is_wp_error($attach_id)){require_once ABSPATH.'wp-admin/includes/image.php'; wp_update_attachment_metadata($attach_id,wp_generate_attachment_metadata($attach_id,$path)); set_post_thumbnail($post_id,$attach_id);}
}

echo 'POST='.$post_id.PHP_EOL;
echo 'STATUS='.get_post_status($post_id).PHP_EOL;
echo 'URL='.get_permalink($post_id).PHP_EOL;
echo 'THUMB='.(get_post_thumbnail_id($post_id)?get_post_thumbnail_id($post_id):'none').PHP_EOL;
