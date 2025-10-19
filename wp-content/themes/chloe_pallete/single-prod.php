<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

global $disableFullpage;
$disableFullpage= true;
global $pageClass;
$pageClass= "light page-product-bg ";

get_header();

$blog_page_link= get_permalink(get_option( 'page_for_posts' ));

$categories = get_categories([
    'hide_empty'       => 0,
]);


while ( have_posts() ) : the_post(); 

$cur_post_id= get_the_ID();
$cur_post_type= get_post_type();
$cur_post_link= get_permalink();
$cur_post_title =get_the_title();
$cur_post_content =get_the_content();



endwhile; 

$sectionTitle = $value["title"];
$sectionContent = $value["content"];
$sectionGallery = $value["gallery"];

nmc_get_template_part( 'partials/section-prod', [
    'sectionId' => $cur_post_id,
    'sectionTitle' => $cur_post_title,
    'sectionContent'=>$cur_post_content,
    'sectionAnchorTitle'=> __("Sản phẩm","tbs"),
    'htag'=>'h1'
]);

?>







<?php 
get_footer();
