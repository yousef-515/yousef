<?php
chdir(__DIR__);
require 'wp-load.php';
$post_id = 14;
$attachments = get_posts(array('post_type'=>'attachment','post_mime_type'=>'image','posts_per_page'=>20));
foreach ($attachments as $attachment) {
    $file = get_attached_file($attachment->ID);
    if ($file && stripos($file, '5899745753180081427') !== false) {
        set_post_thumbnail($post_id, $attachment->ID);
        echo 'ATTACHMENT=' . $attachment->ID . PHP_EOL;
        echo 'THUMB=' . get_post_thumbnail_id($post_id) . PHP_EOL;
        break;
    }
}
