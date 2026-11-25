<?php
chdir(__DIR__);
require 'wp-load.php';
$post_id = 14;
$attachments = get_posts(array('post_type'=>'attachment','posts_per_page'=>50));
echo 'COUNT='.count($attachments).PHP_EOL;
foreach ($attachments as $attachment) {
    echo $attachment->ID.'|'.$attachment->post_mime_type.'|'.$attachment->post_title.'|'.get_attached_file($attachment->ID).PHP_EOL;
}
if ($attachments) {
    set_post_thumbnail($post_id, $attachments[0]->ID);
    echo 'THUMB='.get_post_thumbnail_id($post_id).PHP_EOL;
}
