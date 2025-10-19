<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 */
  
    nmc_get_template_part( 'partials/section-footer', [ 'footer' => false] );
?>
<?php wp_footer(); ?>
<?= tr_options_field('tr_theme_options.script_footer');?>
</body>
</html>