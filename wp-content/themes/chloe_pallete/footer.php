<?php wp_footer(); ?>
<?= tr_options_field('tr_theme_options.script_footer'); ?>
<?php
$logo = wp_get_attachment_url(tr_options_field('tr_theme_options.logo'));
$address_main = tr_options_field('tr_theme_options.address_main');
$address_nam = tr_options_field('tr_theme_options.address_nam');
$address_main_en = tr_options_field('tr_theme_options.address_main_en');
$address_nam_en = tr_options_field('tr_theme_options.address_nam_en');
$address_japan_en = tr_options_field('tr_theme_options.address_japan_en');
$phone = tr_options_field('tr_theme_options.phone');
$email = tr_options_field('tr_theme_options.email');
$linkedin = tr_options_field('tr_theme_options.linkedin');
$facebook = tr_options_field('tr_theme_options.facebook');
$menu_items = wp_get_nav_menu_items(get_nav_menu_locations()['primary'] ?? '');

?>
<footer class="footer">
  <div class="overlay-pattern"></div>
  <div class="kl-container">
    <div class="row gy-4">
      <!-- Left -->
      <div class="col-lg-4">
        <a href="<?= esc_url(home_url('/')) ?>">
          <img src="<?= esc_url($logo) ?>" alt="HIG Logo" style="width: 60px" />
        </a>

        <h5 class="mt-3">H INDOCHINA GROUP (HIG)</h5>

        <h6 class="mt-4" style="color: #fff !important">
          <?= esc_html(__('ĐĂNG KÝ NHẬN THÔNG TIN', 'tbs')) ?>
        </h6>

        <p>
          <?= esc_html(__('Đăng ký ngay để nhận những thông tin, cơ hội đầu tư và cập nhật mới nhất từ chúng tôi!', 'tbs')) ?>
        </p>

        <input type="email" id="email" placeholder="<?= esc_attr(__('Email', 'tbs')) ?>" />

        <button class="btn btn-subscribe" id="subscribe-btn">
          <?= esc_html(__('ĐĂNG KÝ', 'tbs')) ?>
        </button>
      </div>


      <!-- Middle -->
      <div class="col-lg-4 col_middle d-flex justify-content-center">
        <div class="text-start">
          <h6>Sitemap</h6>
          <ul class="list-unstyled">
            <?php

            if ($menu_items):
              foreach ($menu_items as $item): ?>
                <li>
                  <a href="<?= esc_url($item->url); ?>" class="text-white text-decoration-none">
                    <?= esc_html($item->title); ?>
                  </a>
                </li>
            <?php endforeach;
            endif; ?>
          </ul>
        </div>
      </div>

      <!-- Right -->
      <?php
      // Xác định ngôn ngữ hiện tại
      $lang = function_exists('pll_current_language') ? pll_current_language() : 'vi';

      // Hiển thị nội dung theo ngôn ngữ
      $address_main_display  = ($lang === 'en') ? $address_main_en : $address_main;
      $address_nam_display   = ($lang === 'en') ? $address_nam_en : $address_nam;
      $address_japan_display = ($lang === 'en') ? $address_japan_en : $address_japan;
      ?>

      <div class="col-lg-4 col_final">
        <h6><?= esc_html(__('Trụ sở chính', 'tbs')) ?></h6>
        <p><?= wp_kses_post($address_main_display) ?></p>

        <h6><?= esc_html(__('Văn Phòng Miền Nam', 'tbs')) ?></h6>
        <p><?= wp_kses_post($address_nam_display) ?></p>

        <h6><?= esc_html(__('Văn Phòng Tại Nhật Bản', 'tbs')) ?></h6>
        <div class="pra">
          <p><?= wp_kses_post($address_japan_display) ?></p>
          <p><?= esc_html(__('Hotline', 'tbs')) ?>: <?= wp_kses_post($phone) ?></p>
          <p>
            <?= esc_html(__('Email', 'tbs')) ?>:
            <a href="mailto:<?= esc_attr($email) ?>" class="text-white"><?= esc_html($email) ?></a>
          </p>
        </div>
      </div>


    </div>

    <!-- Bottom -->
    <div
      class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3">
      <div class="social-icons col-4 mt-3 mt-md-0">
        <a href="<?= wp_kses_post($facebook) ?>">
          <svg
            width="40"
            height="41"
            viewBox="0 0 40 41"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect
              y="0.96582"
              width="39.176"
              height="39.176"
              rx="19.588"
              fill="#E0E2E2" />
            <path
              d="M21.3882 32.7506V22.2088H24.9267L25.4565 18.1004H21.3882V15.4774C21.3882 14.2879 21.7186 13.4773 23.4244 13.4773L25.5999 13.4763V9.80185C25.2235 9.75196 23.9322 9.64014 22.4298 9.64014C19.2932 9.64014 17.1458 11.5546 17.1458 15.0707V18.1005H13.5981V22.2089H17.1457V32.7507L21.3882 32.7506Z"
              fill="#1E4966" />
          </svg>
        </a>
        <a href="<?= wp_kses_post($linkedin) ?>">
          <svg
            width="40"
            height="41"
            viewBox="0 0 40 41"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect
              x="0.607666"
              y="0.96582"
              width="39.176"
              height="39.176"
              rx="19.588"
              fill="#E0E2E2" />
            <path
              class="st0" d="M28.4,9.5H11.6c-1.4,0-2.6,1.2-2.6,2.6v16.8c0,1.4,1.2,2.6,2.6,2.6h16.8c1.4,0,2.6-1.2,2.6-2.6V12.1c0-1.4-1.2-2.6-2.6-2.6ZM15.8,17.9v10h-3.1v-10h3.1ZM12.7,15c0-.7.6-1.3,1.6-1.3s1.5.6,1.6,1.3c0,.7-.6,1.3-1.6,1.3s-1.6-.6-1.6-1.3ZM27.3,27.8h-3.1v-5.2c0-1-.5-2.1-1.8-2.1h0c-1.3,0-1.8,1.1-1.8,2.1v5.2h-3.1v-10h3.1v1.3s1-1.3,3-1.3,3.8,1.4,3.8,4.3v5.6Z"
              fill="#1E4966" />
          </svg>
        </a>

        <a href="tel:<?= esc_html($phone) ?>">
          <svg
            width="40"
            height="41"
            viewBox="0 0 40 41"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <rect
              x="0.823975"
              y="0.96582"
              width="39.176"
              height="39.176"
              rx="19.588"
              fill="#E0E2E2" />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M12.0866 13.6025C13.2986 12.328 13.7269 11.9705 14.2434 11.8042C14.6008 11.7107 14.9757 11.7055 15.3355 11.789C15.8093 11.9265 15.9346 12.031 17.4882 13.5764C18.853 14.9334 18.9894 15.0805 19.1202 15.3459C19.3704 15.8117 19.4095 16.3619 19.2276 16.8583C19.0899 17.2364 18.8944 17.4866 18.0666 18.3157L17.5267 18.856C17.385 18.9998 17.3516 19.2183 17.4441 19.3977C18.6436 21.4406 20.3454 23.1442 22.3884 24.3473C22.6236 24.473 22.9132 24.4325 23.1046 24.247L23.6238 23.7369C23.9447 23.4085 24.2846 23.0991 24.6416 22.8102C25.2024 22.4665 25.9011 22.4358 26.4899 22.7291C26.7777 22.8666 26.8727 22.9518 28.2803 24.3542C29.7319 25.7992 29.7732 25.8446 29.933 26.176C30.2336 26.7245 30.2305 27.3888 29.9247 27.9345C29.7691 28.2424 29.6741 28.3538 28.8574 29.187C28.3643 29.6902 27.9002 30.1494 27.8258 30.2168C27.1521 30.7737 26.2876 31.0468 25.4156 30.9785C23.8201 30.8333 22.2759 30.341 20.8914 29.5362C17.8244 27.9141 15.2135 25.5506 13.2972 22.6617C12.8798 22.0571 12.5088 21.422 12.1872 20.7616C11.3244 19.2855 10.8789 17.6034 10.8981 15.8945C10.9639 15.0005 11.3934 14.1723 12.0866 13.6025Z"
              fill="#1E4966" />
          </svg>
        </a>
      </div>
    </div>
  </div>
  <a
    href="javascript:void(0)"
    id="backToTop"
    class="back-to-top"
    style="display: none">
    <!--        <svg class="icon__arrow-up" viewBox="0 0 24 24">-->
    <!--            <title>Back to top</title>-->
    <!--            <path d="M18.71,11.71a1,1,0,0,1-1.42,0L13,7.41V19a1,1,0,0,1-2,0V7.41l-4.29,4.3a1,1,0,0,1-1.42-1.42l6-6a1,1,0,0,1,1.42,0l6,6A1,1,0,0,1,18.71,11.71Z"/>-->
    <!--        </svg>-->
    <svg
      class="icon__arrow-up"
      width="13"
      height="7"
      viewBox="0 0 13 7"
      fill="none"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M12 6L6.5 1L1 6"
        stroke="white"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round" />
    </svg>
  </a>
  <!-- <div class="user">
        <a href="javascript:void(0)" class="user_fixed">
          <svg
            width="50"
            height="50"
            viewBox="0 0 50 50"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M0 5C0 2.23858 2.23858 0 5 0H64V50H5C2.23858 50 0 47.7614 0 45V5Z"
              fill="#204A65"
            />
            <path
              d="M5 0.5H63.5V49.5H5C2.51472 49.5 0.5 47.4853 0.5 45V5C0.500001 2.51472 2.51472 0.5 5 0.5Z"
              stroke="#E8E8E8"
              stroke-opacity="0.5"
            />
            <path
              d="M25.4997 25.5C29.5268 25.5 32.7913 22.2354 32.7913 18.2083C32.7913 14.1812 29.5268 10.9166 25.4997 10.9166C21.4726 10.9166 18.208 14.1812 18.208 18.2083C18.208 22.2354 21.4726 25.5 25.4997 25.5Z"
              fill="#E6AF6C"
            />
            <path
              opacity="0.7"
              d="M25.5004 29.1459C18.1942 29.1459 12.2441 34.0459 12.2441 40.0834C12.2441 40.4917 12.565 40.8125 12.9733 40.8125H38.0276C38.4359 40.8125 38.7567 40.4917 38.7567 40.0834C38.7567 34.0459 32.8067 29.1459 25.5004 29.1459Z"
              fill="#E0E2E2"
            />
            <path
              d="M39.252 29.4959C37.9395 28.1834 36.9042 28.6063 36.0146 29.4959L30.852 34.6584C30.6479 34.8626 30.4583 35.2417 30.4145 35.5188L30.1375 37.4875C30.0354 38.2021 30.5312 38.6979 31.2458 38.5958L33.2145 38.3188C33.4916 38.275 33.8854 38.0854 34.075 37.8813L39.2374 32.7188C40.1416 31.8438 40.5645 30.8084 39.252 29.4959Z"
              fill="white"
            />
          </svg>
        </a>
      </div> -->
</footer>
</body>

</html>