<?php
chdir(__DIR__);
require 'wp-load.php';
header('Content-Type:text/plain; charset=utf-8');
$theme=wp_get_theme();
echo 'THEME='.$theme->get('Name').'|'.get_stylesheet().PHP_EOL;
echo 'FRONT='.get_option('show_on_front').'|PAGE_ON_FRONT='.get_option('page_on_front').'|PAGE_FOR_POSTS='.get_option('page_for_posts').PHP_EOL;
echo 'PERMALINK='.get_option('permalink_structure').PHP_EOL;
echo 'LOCALE='.get_locale().PHP_EOL;
echo 'PAGES'.PHP_EOL;
foreach(get_pages(array('post_status'=>array('publish','draft','private'))) as $p){echo $p->ID.'|'.$p->post_name.'|'.$p->post_status.'|'.$p->post_title.PHP_EOL;}
echo 'DOCTOR='.(get_post_type_object('doctor') ? get_post_type_object('doctor')->rewrite['slug'] : 'missing').PHP_EOL;
echo 'TAXONOMIES'.PHP_EOL;
foreach(array('doctor_specialty','doctor_governorate','doctor_area') as $name){$tax=get_taxonomy($name);echo $name.'|'.($tax?$tax->rewrite['slug']:'missing').PHP_EOL;}
echo 'ACTIVE_PLUGINS'.PHP_EOL;
foreach(get_option('active_plugins',array()) as $plugin){echo $plugin.PHP_EOL;}
