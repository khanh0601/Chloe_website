<?php


global $disableFullpage;
$disableFullpage= true;
get_header();

$pageID = get_option( 'page_for_posts' );
?>

<?php
nmc_get_template_part( 'partials/section-banner', [
    'sectionId' => $pageID
] );

?>


<section  class=" animatedParent animateOnce section-news-list section-top ">
    <div class=" section-padding div_zindex">
        <div class="container-d">

            <div class="section-content-wrapper ">

                <div class="items post-list row gutter-lg">
                    <?php
                    if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post();
                                echo '<div class="col-sm-6 col-lg-4">';
                                nmc_get_template_part( 'partials/content-news-other', [
                                    'post' => $post
                                ] );
                                echo '</div>';

                            } // end while
                        } // end if
                    ?>
                </div>
                <?php
                  if (function_exists('custom_pagination')) {
                    custom_pagination();
                  }
                ?>



            </div>

        </div>
    </div>
</section>



<?php get_footer(); ?>