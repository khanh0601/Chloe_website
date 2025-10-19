<?php

if (have_posts()) {
  while (have_posts()) {
    the_post();
    wp_redirect(get_permalink($post->ID));
    exit();
  }
}
else{
     wp_redirect(home_url());
}
?>
