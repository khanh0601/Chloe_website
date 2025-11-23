<?php

    /**
     * The Header for our theme.
     *
     * Displays all of the <head> section and everything up till <div id="main">
     */

?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7"                     <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8"                     <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html      <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title><?php wp_title(''); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css?v=<?php echo SITE_VERSION?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
    $currentLang = get_locale();
    $currentLang = explode("_", $currentLang)[0];
    wp_enqueue_script('jquery-cus', "https://code.jquery.com/jquery-3.7.1.min.js", [], null, true);
    wp_enqueue_style('swiper', get_template_directory_uri() . '/plugin/swiper/swiper-bundle.min.css');
    wp_enqueue_script('swiper', get_template_directory_uri() . '/plugin/swiper/swiper-bundle.min.js', [], SITE_VERSION, true);
    wp_enqueue_script('gsap', get_template_directory_uri() . '/js/gsap.min.js', [], SITE_VERSION, true);
    wp_enqueue_script('scrolltrigger', get_template_directory_uri() . '/js/ScrollTrigger.min.js', [], SITE_VERSION, true);
    wp_enqueue_script('lenis', get_template_directory_uri() . '/js/lenis.min.js', [], SITE_VERSION, true);
    wp_enqueue_script('animation', get_template_directory_uri() . '/js/animation.js', [], SITE_VERSION, true);
    // wp_enqueue_script('global', get_template_directory_uri() . '/js/global.js');
    wp_enqueue_script('splitType', get_template_directory_uri() . '/js/split-type.js', [], null, true);
    wp_head();

    $currentLang = get_locale();
    $currentLang = explode("_", $currentLang)[0];
    $homeUrl     = home_url();
    $isFrontPage = is_front_page();

    $languages = [
        ["url" => "#", "slug" => "vi"],
        ["url" => "#", "slug" => "en"],
    ];
    if (function_exists("pll_the_languages")) {
        $languages = pll_the_languages([
            'show_flags'   => 0,
            'hide_current' => 0,
            'raw'          => 1,
        ]);
    }

?>

<?php echo tr_options_field('tr_theme_options.script_header');?>


</head>

<?php
    global $disableFullpage;
    global $pageClass;
?>
<body class="<?php echo $isFrontPage ? "home-page" : ""?> <?php echo ! empty($disableFullpage) ? "disable-fullpage" : ""?> <?php echo $pageClass?>">
  <?php echo tr_options_field('tr_theme_options.script_body');?>

  <!-- Header -->
  <header>
      <div class="header ">
        <div class="kl_container">
          <div class="header_inner">
            <div class="header_menu">
              <?php
                  // Lấy URL hiện tại
                  $current_url = home_url($_SERVER['REQUEST_URI']);

                  // Hàm kiểm tra menu active
                  function is_menu_active($menu_url, $current_url)
                  {
                      $menu_url    = trailingslashit($menu_url);
                      $current_url = trailingslashit($current_url);
                      return $menu_url === $current_url;
                  }

                  // Lấy menu theo TÊN "header"
                  $menu = wp_get_nav_menu_object('header');

                  if ($menu) {
                      $menu_items = wp_get_nav_menu_items($menu->term_id);

                      // Tổ chức menu
                      $menu_list     = [];
                      $menu_children = [];

                      foreach ($menu_items as $item) {
                          if ($item->menu_item_parent == 0) {
                              $menu_list[$item->ID] = $item;
                          } else {
                              $menu_children[$item->menu_item_parent][] = $item;
                          }
                      }

                      // Render theo structure của theme
                      foreach ($menu_list as $parent_id => $parent) {
                          $has_children = isset($menu_children[$parent_id]);
                          // Kiểm tra parent active
                          $is_parent_active = is_menu_active($parent->url, $current_url);

                          // Kiểm tra nếu có child active thì parent cũng active
                          $has_active_child = false;
                          if ($has_children) {
                              foreach ($menu_children[$parent_id] as $child) {
                                  if (is_menu_active($child->url, $current_url)) {
                                      $has_active_child = true;
                                      break;
                                  }
                              }
                          }

                          $is_active    = $is_parent_active || $has_active_child;
                          $active_class = $is_active ? 'active' : '';
                      ?>
                                    <a
                                      href="<?php echo esc_url($parent->url)?>"
                                      class="header_menu_item txt_uppercase txt_16 txt_wh_500 <?php echo $active_class?>"
                                      ><?php echo esc_html($parent->title)?></a
                                    >
                                <?php
                                    }
                                    }
                                ?>
            </div>
            <div class="header_logo">
              <a href="/" class="header_logo_inner">
                <svg
                  viewBox="0 0 94 90"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_209_1817)">
                    <path
                      d="M93.7097 22.5781C93.2437 30.073 88.96 35.3411 82.1746 38.1419C73.5204 41.7144 63.5435 41.1699 54.3416 41.273C54.456 48.1548 54.1912 55.0579 54.3367 61.9413C54.4004 64.9383 54.5345 68.0122 54.7046 71.0157C54.8092 72.8698 55.0921 74.7305 55.0773 76.5895H44.2862C44.3025 76.081 44.2616 75.566 44.2878 75.0575C44.4431 71.9559 44.7603 68.8477 44.9042 65.7428C45.1462 49.1047 44.968 32.4209 45.0219 15.7666C47.7475 15.9301 50.478 18.2976 52.1964 20.3021C52.7589 20.9578 54.3416 23.2599 54.3416 24.0431V39.6788C63.4503 39.7589 75.2225 40.4505 81.0023 31.9419C84.9493 26.131 84.9574 15.5965 81.2001 9.69407C75.5708 0.853487 63.5468 1.55655 54.3416 1.66446V11.4746C51.3413 10.026 48.1219 8.94523 44.7767 8.65419L44.2862 0.0703099C51.0405 0.233812 57.8324 -0.145514 64.5866 0.0654048C79.4474 0.528117 94.8395 4.41457 93.7097 22.5781Z"
                      fill="currentColor"
                    />
                    <path
                      d="M72.981 56.2335C70.0151 70.6969 62.3223 85.2307 46.8876 88.9405C34.795 91.846 20.8924 88.7476 11.9553 79.9806C-0.832228 67.4351 -3.3142 43.9201 5.26969 28.4381C13.1358 14.2509 29.4468 7.0748 45.3965 10.304C56.4885 12.5489 64.438 20.549 69.1796 30.4802L59.6163 33.057C57.2864 23.4071 51.9268 13.0476 41.1242 11.388C24.7412 8.87006 14.4128 23.2779 11.6038 37.5909C7.14833 60.2916 16.4794 90.8045 44.9403 86.748C60.5516 84.5211 68.5141 70.4468 71.6174 56.3054L72.981 56.2335Z"
                      fill="currentColor"
                    />
                    <path
                      d="M7.99424 3.57068C7.97134 3.847 8.01059 4.14458 7.61981 4.11678V2.76788C6.24312 2.77606 5.69048 2.40818 5.90304 4.11678C5.78859 4.1691 5.53516 4.00723 5.53516 3.93202V1.17373H5.90304C5.93901 1.38138 5.85399 2.35259 5.90304 2.4C5.96353 2.46213 7.35985 2.35422 7.61981 2.4V1.11324C7.63289 1.00042 7.77678 1.02331 7.8667 1.10997C8.04983 1.28819 8.02694 3.18155 7.99424 3.57068Z"
                      fill="currentColor"
                    />
                    <path
                      d="M14.5997 1.97174C14.6373 2.68134 15.4352 2.32327 15.9584 2.40012V2.768C14.9529 2.7631 14.4983 2.49986 14.6095 3.74902C14.7501 3.89126 16.2576 3.43346 16.2037 4.1169C15.7377 4.02861 14.8172 4.23789 14.4248 4.1169C14.3185 4.0842 14.2629 3.92233 14.2416 3.80951C14.1811 3.48251 14.1828 1.81151 14.2449 1.48451C14.3986 0.671897 16.6075 1.06594 16.2037 1.4191C15.5676 1.52375 14.549 1.05776 14.5997 1.97174Z"
                      fill="currentColor"
                    />
                    <path
                      d="M33.251 4.05803C33.0434 4.17412 31.5849 4.17739 31.464 4.00244C31.3659 3.86183 31.3691 1.30138 31.464 1.16567C31.6046 0.964561 33.3704 0.974371 33.3688 1.23597C33.3688 1.57443 32.1294 1.30792 31.8923 1.47305C31.688 1.6153 31.8008 2.15322 31.7779 2.40011H33.1268V2.76799H31.7779V3.74901C31.8318 3.80297 32.8995 3.69505 33.1709 3.76536C33.3197 3.8046 33.4374 3.95339 33.251 4.05803Z"
                      fill="currentColor"
                    />
                    <path
                      d="M17.5527 3.50367C17.6786 3.38758 19.281 4.37841 19.281 3.32054C19.2826 2.54881 17.7751 3.00008 17.6754 1.95857C17.5331 0.49195 20.1443 1.19338 19.6374 1.66426C19.5033 1.78689 18.7627 1.12143 18.2182 1.53183C17.4432 2.1139 19.0144 2.4409 19.2613 2.59296C20.8293 3.55599 18.1659 5.15668 17.5527 3.50367Z"
                      fill="currentColor"
                    />
                    <path
                      d="M38.3999 4.11686H36.5605C36.6994 3.39255 36.3724 1.84418 36.5605 1.23431C36.6422 0.969439 38.153 0.928564 38.3982 1.23758C38.4571 1.53352 38.1611 1.4109 37.9715 1.41907C37.6249 1.43379 37.2733 1.40926 36.9283 1.41907V2.40009C38.6762 2.25457 38.6762 2.91349 36.9283 2.76797V3.67868C36.9627 3.92393 38.4816 3.43833 38.3999 4.11686Z"
                      fill="currentColor"
                    />
                    <path
                      d="M5.16564 3.81107C3.6794 5.11909 1.8171 2.91508 3.03029 1.54983C3.84617 0.630945 5.37656 1.25553 5.04465 1.54165C4.95472 1.6185 4.34812 1.40268 4.1274 1.41085C2.97961 1.455 2.68203 3.05569 3.57476 3.68517L5.16564 3.81107Z"
                      fill="currentColor"
                    />
                    <path
                      d="M36.0694 1.41907C35.9337 1.45504 35.0884 1.37002 35.0884 1.41907V3.9321C35.0884 4.14465 34.5979 4.14465 34.5979 3.9321V1.41907C34.5979 1.36675 33.6169 1.53352 33.6201 1.23431C33.6201 1.22286 33.7885 1.05119 33.8 1.05119C34.2594 1.05119 35.5674 0.95799 35.8863 1.05119C35.9942 1.08389 36.1086 1.29317 36.0694 1.41907Z"
                      fill="currentColor"
                    />
                    <path
                      d="M28.7086 3.93369C28.7102 4.21164 26.7498 4.21001 26.7498 3.93205C26.7498 3.35162 26.6337 1.64302 26.7498 1.23426C26.7776 1.14107 27.0245 0.985738 27.1161 1.05114C27.3842 1.24244 27.1439 3.6541 27.2403 3.74893C27.3123 3.82251 28.7086 3.59687 28.7086 3.93369Z"
                      fill="currentColor"
                    />
                    <path
                      d="M10.5625 4.11681H8.72314V1.23426C8.72314 1.05277 9.09103 1.05277 9.09103 1.23426V3.74893C9.22183 3.87973 10.6541 3.45626 10.5625 4.11681Z"
                      fill="currentColor"
                    />
                    <path
                      d="M30.9211 4.05795C30.5777 4.24925 29.6343 4.0416 29.2026 4.11681V1.23426C29.2026 1.05277 29.5705 1.05277 29.5705 1.23426C29.5705 1.59233 29.4822 3.66064 29.5705 3.74893C29.6212 3.79962 30.5842 3.69824 30.8409 3.76528C30.9897 3.80452 31.1074 3.95331 30.9211 4.05795Z"
                      fill="currentColor"
                    />
                    <path
                      d="M16.5721 1.90794C17.1264 1.38147 16.4838 1.45668 16.5737 1.23758C16.837 0.586843 17.7133 1.87197 16.5721 1.90794Z"
                      fill="currentColor"
                    />
                    <path
                      d="M12.002 1.07893C9.96962 1.49586 11.0373 5.17794 13.0582 3.97619C14.5542 3.0851 13.74 0.72249 12.002 1.07893ZM11.8761 3.72276C11.0242 3.47097 11.1452 1.70187 11.9987 1.44354C13.8234 0.894168 13.9754 4.34407 11.8761 3.72276Z"
                      fill="currentColor"
                    />
                    <path
                      d="M25.0954 1.05286C24.7553 1.33081 23.6958 3.99263 23.807 4.11689C24.0718 4.40793 24.3089 3.39094 24.3727 3.37296C24.492 3.34026 25.5712 3.35661 25.6905 3.39748C26.0584 3.52338 25.7853 4.30165 26.3821 4.11689C26.2987 3.69669 25.2719 1.06103 25.0954 1.05286ZM24.5427 3.01325L25.0954 1.78698L25.5237 3.01325H24.5427Z"
                      fill="currentColor"
                    />
                    <path
                      d="M21.3543 1.23418C21.2415 1.59879 21.3543 3.38097 21.3543 3.93197C21.3543 4.00718 21.6078 4.16905 21.7222 4.11673C21.2546 2.11546 23.0466 3.43329 23.385 2.40649C23.9132 0.800898 21.4753 0.843409 21.3543 1.23418ZM22.2765 2.65829C21.3969 2.66483 21.6601 1.52358 21.9233 1.43692C23.2902 0.985656 23.4962 2.64684 22.2765 2.65829Z"
                      fill="currentColor"
                    />
                    <path
                      d="M68.4435 46.9137V47.8947L69.794 47.9569C69.7842 48.4654 68.728 48.2054 68.4435 48.2626V49.2436C68.7901 49.3041 69.7907 49.1063 69.9771 49.3663C70.0981 49.4333 69.8676 49.6115 69.8529 49.6115H68.0756C68.2146 48.8872 67.8876 47.3372 68.0756 46.7306C68.1688 46.4265 70.0343 46.4706 70.0343 46.729C70.0343 47.0331 68.6953 46.881 68.4435 46.9137Z"
                      fill="currentColor"
                    />
                    <path
                      d="M67.2156 49.5525C66.7677 49.2664 66.421 48.5323 66.0531 48.1415C65.4858 48.5486 65.4286 48.9312 65.5005 49.6114C65.3861 49.6637 65.1326 49.5019 65.1326 49.4283C65.1326 48.7906 65.01 47.221 65.1326 46.7305C65.1408 46.6978 65.3125 46.4901 65.3779 46.6062C65.6395 46.7926 65.4384 47.7916 65.5021 48.1399C66.0744 47.8227 66.6646 46.9888 67.1568 46.6684C67.3137 46.5654 67.4249 46.5359 67.4625 46.7321C67.5263 47.0788 66.4128 47.5791 66.3671 47.8505C66.3295 48.0876 67.389 48.995 67.4642 49.4266C67.5067 49.6605 67.3939 49.6654 67.2156 49.5525Z"
                      fill="currentColor"
                    />
                    <path
                      d="M79.2346 46.7305V48.8135C79.2346 48.9083 78.7408 49.4953 78.6182 49.5476C78.0427 49.7896 76.9047 49.4185 76.9047 48.8135C76.9047 48.3394 76.8082 47.0722 76.9047 46.7305C76.9668 46.5081 77.2726 46.5784 77.2726 46.7305V48.6925C77.2726 49.4266 78.8667 49.4266 78.8667 48.6925V46.7305C78.8667 46.5474 79.2346 46.5474 79.2346 46.7305Z"
                      fill="currentColor"
                    />
                    <path
                      d="M73.591 48.9262C73.4193 50.2457 71.0894 49.3922 71.5096 48.9982C71.5799 48.9328 73.1593 49.7732 73.2362 48.9344C73.3163 48.0417 71.4981 48.5485 71.6224 47.2176C71.7401 45.9488 74.0046 46.7876 73.5942 47.1588C73.47 47.2699 72.1276 46.4557 71.9936 47.2225C71.8186 48.2362 73.7594 47.6329 73.591 48.9262Z"
                      fill="currentColor"
                    />
                    <path
                      d="M59.8041 49.1161C58.8558 47.9143 59.997 46.1338 61.5568 46.6276C62.1062 46.8025 61.9787 47.1737 61.6958 47.105C61.063 46.9529 60.4205 46.657 60.0101 47.4941C59.3267 48.8888 60.705 49.6213 61.9443 49.121C62.2942 49.4284 60.5873 50.1085 59.8041 49.1161Z"
                      fill="currentColor"
                    />
                    <path
                      d="M75.4336 46.9137V49.4283C75.4336 49.6392 74.9431 49.6392 74.9431 49.4283V46.9137C74.9431 46.8613 73.9621 47.0281 73.9653 46.7289C73.9653 46.7175 74.1337 46.5458 74.1468 46.5458H76.2299C76.7694 46.5458 75.9388 47.172 75.4336 46.9137Z"
                      fill="currentColor"
                    />
                    <path
                      d="M83.4045 46.7306V49.6115H83.0366V46.7306C83.0366 46.5475 83.4045 46.5475 83.4045 46.7306Z"
                      fill="currentColor"
                    />
                    <path
                      d="M63.632 46.7583C63.5666 46.6536 63.4489 46.4296 63.2952 46.5457C63.1644 46.6454 62.2112 49.2173 62.1899 49.6114C62.5856 49.7242 62.5464 48.9933 62.7001 48.8969C62.7736 48.8495 63.7939 48.8462 63.9721 48.8658C64.3155 48.9067 64.3155 49.5493 64.3989 49.6114C64.4986 49.6833 64.6915 49.5443 64.7504 49.4299C64.3269 48.668 64.0784 47.4646 63.632 46.7583ZM62.9257 48.5077C62.8456 48.4309 63.2053 47.6052 63.2821 47.4564C63.3296 47.3649 63.3312 47.0591 63.5372 47.2815C63.5813 47.3273 63.8266 48.3246 63.9067 48.5077H62.9257Z"
                      fill="currentColor"
                    />
                    <path
                      d="M81.8003 46.7403C81.4455 46.5408 79.9707 46.392 79.9707 46.7305V49.6114C80.7817 49.5313 81.7087 49.9171 82.2041 49.0865C82.6293 48.372 82.5802 47.1785 81.8003 46.7403ZM80.3386 49.2435V46.9136C82.7077 46.4165 82.7077 49.77 80.3386 49.2435Z"
                      fill="currentColor"
                    />
                    <path
                      d="M84.9626 46.572C83.5777 46.8908 83.4878 49.502 85.1768 49.618C87.613 49.7864 87.2532 46.0439 84.9626 46.572ZM85.8651 49.1897C84.0862 49.7799 83.8262 47.2276 85.0852 46.9399C86.6303 46.5867 86.8494 48.8627 85.8651 49.1897Z"
                      fill="currentColor"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_209_1817">
                      <rect
                        width="93.5382"
                        height="90"
                        fill="currentColor"
                        transform="translate(0.230957)"
                      />
                    </clipPath>
                  </defs>
                </svg>
              </a>
            </div>
            <div class="header_icon">
              <div class="header_icon_inner">
                <div class="header_icon_item_wrap">
                  <div class="header_icon_item img_full">
                  <svg width="100%" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.5 17.5L13.875 13.875M15.8333 9.16667C15.8333 12.8486 12.8486 15.8333 9.16667 15.8333C5.48477 15.8333 2.5 12.8486 2.5 9.16667C2.5 5.48477 5.48477 2.5 9.16667 2.5C12.8486 2.5 15.8333 5.48477 15.8333 9.16667Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

                  </div>
                </div>

                <div class="header_icon_item_wrap cart">
                  <div class="header_icon_item img_full">
                  <svg width="100%" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.6 2.20008L3.3 3.93341C3.04251 4.27673 2.91377 4.44839 2.91676 4.59207C2.91936 4.71711 2.97799 4.83437 3.07646 4.91148C3.18962 5.00008 3.40419 5.00008 3.83333 5.00008H16.1667C16.5958 5.00008 16.8104 5.00008 16.9235 4.91148C17.022 4.83437 17.0806 4.71711 17.0832 4.59207C17.0862 4.44839 16.9575 4.27673 16.7 3.93341L15.4 2.20008M4.6 2.20008C4.74667 2.00453 4.82 1.90675 4.91294 1.83623C4.99525 1.77377 5.08846 1.72716 5.18782 1.69879C5.3 1.66675 5.42222 1.66675 5.66667 1.66675H14.3333C14.5778 1.66675 14.7 1.66675 14.8122 1.69879C14.9115 1.72716 15.0047 1.77377 15.0871 1.83623C15.18 1.90675 15.2533 2.00453 15.4 2.20008M4.6 2.20008L3.03333 4.28897C2.83545 4.55281 2.73651 4.68474 2.66625 4.83002C2.6039 4.95893 2.55843 5.09534 2.53096 5.23588C2.5 5.39426 2.5 5.55916 2.5 5.88897L2.5 15.6667C2.5 16.6002 2.5 17.0669 2.68166 17.4234C2.84144 17.737 3.09641 17.992 3.41002 18.1518C3.76654 18.3334 4.23325 18.3334 5.16667 18.3334L14.8333 18.3334C15.7668 18.3334 16.2335 18.3334 16.59 18.1518C16.9036 17.992 17.1586 17.737 17.3183 17.4234C17.5 17.0669 17.5 16.6002 17.5 15.6667V5.88897C17.5 5.55916 17.5 5.39426 17.469 5.23588C17.4416 5.09534 17.3961 4.95893 17.3338 4.83002C17.2635 4.68474 17.1646 4.55282 16.9667 4.28897L15.4 2.20008M13.3333 8.33341C13.3333 9.21747 12.9821 10.0653 12.357 10.6904C11.7319 11.3156 10.8841 11.6667 10 11.6667C9.11594 11.6667 8.2681 11.3156 7.64298 10.6904C7.01786 10.0653 6.66667 9.21747 6.66667 8.33341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>

                  </div>
                  <div class="header_icon_item_num txt_14">(<span>0</span>)</div>
                </div>
              </div>
            </div>
            <div class="navbar-toggler-icon-wrap tablet">
              <div class="navbar-toggler-icon">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
  </header>
  <section class="menu_cart">
    <div class="menu_cart_overlay"></div>
    <div class="menu_cart_inner">
      <div class="menu_cart_head">
        <div class="menu_cart_title txt_32">Cart (2)</div>
        <div class="menu_cart_icon img_full">
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon_close.svg" alt="">
        </div>
      </div>
      <div class="menu_cart_content">
        <div class="menu_cart_content_item">
          <div class="menu_cart_content_item_img img_abs">
            <div class="menu_cart_content_item_img_overlay"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/img_cart.webp" alt="">
          </div>
          <div class="menu_cart_content_item_info">
            <div class="menu_cart_content_item_info_cate txt_12">Chantilly Cake</div>
            <div class="menu_cart_content_item_info_name txt_title_color txt_wh_500 txt_16">Butter Croissant</div>
            <div class="menu_cart_content_item_info_price txt_14">
              <div class="menu_cart_content_item_info_price_new txt_14">$160</div>
              -
              <div class="menu_cart_content_item_info_price_old txt_14">$170</div>
            </div>
            <div class="menu_cart_content_item_info_amount txt_14">
              <div class="menu_cart_content_item_info_amount_reduce txt_14">-</div>
              <div class="menu_cart_content_item_info_amount_txt txt_14">1</div>
              <div class="menu_cart_content_item_info_amount_increate txt_14">+</div>
            </div>
          </div>
          <div class="menu_cart_content_item_remove txt_14">Remove</div>
        </div>
        <div class="menu_cart_content_item">
          <div class="menu_cart_content_item_img img_full">
            <img src="<?php echo get_template_directory_uri(); ?>/images/img_cart.webp" alt="">
          </div>
          <div class="menu_cart_content_item_info">
            <div class="menu_cart_content_item_info_cate txt_12">Chantilly Cake</div>
            <div class="menu_cart_content_item_info_name txt_title_color txt_wh_500 txt_16">Butter Croissant</div>
            <div class="menu_cart_content_item_info_price txt_14">
              <div class="menu_cart_content_item_info_price_new txt_14">$160</div>
              -
              <div class="menu_cart_content_item_info_price_old txt_14">$170</div>
            </div>
            <div class="menu_cart_content_item_info_amount txt_14">
              <div class="menu_cart_content_item_info_amount_reduce txt_14">-</div>
              <div class="menu_cart_content_item_info_amount_txt txt_14" >1</div>
              <div class="menu_cart_content_item_info_amount_increate txt_14">+</div>
            </div>
          </div>
          <div class="menu_cart_content_item_remove txt_14">Remove</div>
        </div>
      </div>
      <div class="menu_cart_button">
        <div class="menu_cart_button_total">
          <div class="menu_cart_button_total_txt txt_16 txt_title_color">Subtotal (1 items)</div>
          <div class="menu_cart_button_total_price txt_24 txt_wh_500 txt_title_color">$160</div>
        </div>
        <div class="menu_cart_button_check">
          <div class="menu_cart_button_check_txt txt_wh_500 color_white txt_16 txt_uppercase">Checkout now</div>
          <div class="menu_cart_button_check_icon img_full">
            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="cursor">
    <div class="cursor-main" >
      <div class="cursor-inner active">
        <div class=" txt_16 cursor-inner-explore-txt">Explore</div>
        <div class=" txt_16 cursor-inner-drag-txt">Drag</div>
        <div class="txt_16 cursor-inner-detail-txt">Detail</div>
      </div>
    </div>
  </div>
  <div  class="fp-custom ">