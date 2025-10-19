<?php
/**
 * The default template for displaying content
 */


?>


<div class="banner_container">
       <?php the_post_thumbnail("full" ); ?>
      <div class="banner_caption">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <p class="post-excerpt">
                <?php 
                    if (function_exists('has_excerpt') && has_excerpt())
                    echo get_the_excerpt(); 
                ?>
            </p>
      </div>
</div>
<div class="valpar_content">
        <?php 
            the_content();
         ?>
</div>
