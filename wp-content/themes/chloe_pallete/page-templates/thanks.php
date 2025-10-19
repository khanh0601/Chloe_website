<?php
/**
 * Template Name: Cảm ơn
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

?>
<?php
    nmc_get_template_part( 'partials/section-banner', [ 'sectionId' => $sectionId] );
?>


<?php get_footer("none"); ?>
