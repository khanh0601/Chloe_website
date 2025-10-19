<?php
/**
 * Template Name: Đối tác
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage tbs
 * @since tbs 1.0
 */

get_header();



$pageID = $sectionId = get_queried_object_id();
$homePageId = get_option('page_on_front');

?>
<?php 
nmc_get_template_part( 'partials/section-partner', [ 
    'sectionId' => $homePageId
] );

?>



<?php get_footer(); ?>
