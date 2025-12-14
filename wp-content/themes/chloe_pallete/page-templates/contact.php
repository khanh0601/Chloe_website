<?php
/**
 * Template Name: contact
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */

$pageClass = 'on_dark';

get_header(null, array('pageClass' => $pageClass));
wp_enqueue_style( 'contact-css', get_template_directory_uri() . '/css/contact.css');
wp_enqueue_script( 'contact-js', get_template_directory_uri() . '/js/contact.js');

?>
   <div class="main" data-barba-namespace="contact">
   <section class="contact_content">
        <div class="kl_container">
            <div class="contact_content_inner">
                <div class="contact_content_left">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.303789168648!2d108.1526008!3d16.0497179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421937a50a8dc1%3A0x15a0459df2733132!2zNDQgxJDDoCBTxqFuLCBIb8OgIEtow6FuaCBOYW0sIExpw6puIENoaeG7g3UsIMSQw6AgTuG6tW5nIDU1MDAwMA!5e0!3m2!1svi!2s!4v1759759521542!5m2!1svi!2s" frameborder="0"></iframe>
                </div>
                <div class="contact_content_right">
                    <div class="contact_content_right_item about_border_bottom">
                        <div class="contact_content_right_item_title txt_44 txt_title_color txt_wh_500">We would love to hear from you</div>
                        <div class="contact_content_right_item_des txt_16">Contact our team for any issues and we will get back to you as soon as possible.</div>
                    </div>
                    <div class="contact_content_right_item about_border_bottom">
                        <div class="contact_content_right_item_card">
                            <div class="contact_content_right_item_card_label txt_16">Hotline</div>
                            <div class="contact_content_right_item_card_des txt_16 txt_title_color txt_wh_500">(01) 654-886-433</div>
                        </div>
                        <div class="contact_content_right_item_card">
                            <div class="contact_content_right_item_card_label txt_16">Hotline</div>
                            <div class="contact_content_right_item_card_des txt_16 txt_title_color txt_wh_500">(01) 654-886-433</div>
                        </div>
                        <div class="contact_content_right_item_card">
                            <div class="contact_content_right_item_card_label txt_16">Hotline</div>
                            <div class="contact_content_right_item_card_des txt_16 txt_title_color txt_wh_500">(01) 654-886-433</div>
                        </div>
                    </div>
                    <div class="contact_content_right_item about_border_bottom">
                        <div class="contact_content_right_item_social">
                            <div class="contact_content_right_item_social_label txt_16">Social</div>
                            <div class="contact_content_right_item_social_content">
                                <a href="#" class="contact_content_right_item_social_content_img svg_full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0229 20L10 13H7V10H10V8C10 5.3008 11.6715 4 14.0794 4C15.2328 4 16.2241 4.08587 16.5129 4.12425V6.94507L14.843 6.94583C13.5334 6.94583 13.2799 7.5681 13.2799 8.48124V10H17L16 13H13.2799V20H10.0229Z" fill="currentColor"/>
                                </svg>
                                </a>
                                <a href="#" class="contact_content_right_item_social_content_img svg_full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8 8.8C19.6 7.5 19 6.6 17.6 6.4C15.4 6 12 6 12 6C12 6 8.6 6 6.4 6.4C5 6.6 4.3 7.5 4.2 8.8C4 10.1 4 12 4 12C4 12 4 13.9 4.2 15.2C4.4 16.5 5 17.4 6.4 17.6C8.6 18 12 18 12 18C12 18 15.4 18 17.6 17.6C19 17.3 19.6 16.5 19.8 15.2C20 13.9 20 12 20 12C20 12 20 10.1 19.8 8.8ZM10 15V9L15 12L10 15Z" fill="currentColor"/>
                                </svg>
                                </a>
                                <a href="#" class="contact_content_right_item_social_content_img svg_full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.2857 9.97901H12.7617V11.2123C13.1183 10.503 14.033 9.86567 15.407 9.86567C18.041 9.86567 18.6663 11.2777 18.6663 13.8683V18.6663H15.9997V14.4583C15.9997 12.983 15.643 12.151 14.735 12.151C13.4757 12.151 12.9523 13.0477 12.9523 14.4577V18.6663H10.2857V9.97901ZM5.71301 18.553H8.37967V9.86567H5.71301V18.553ZM8.76167 7.03301C8.76177 7.25652 8.71745 7.47783 8.63127 7.68407C8.54509 7.8903 8.41878 8.07735 8.25967 8.23434C7.93727 8.55476 7.50088 8.73411 7.04634 8.73301C6.5926 8.7327 6.15722 8.55381 5.83434 8.23501C5.67582 8.07748 5.54993 7.89022 5.4639 7.68396C5.37788 7.4777 5.33339 7.25649 5.33301 7.03301C5.33301 6.58167 5.51301 6.14967 5.83501 5.83101C6.1576 5.51178 6.59317 5.33281 7.04701 5.33301C7.50167 5.33301 7.93767 5.51234 8.25967 5.83101C8.58101 6.14967 8.76167 6.58167 8.76167 7.03301Z" fill="currentColor"/>
                                </svg>
                                </a>
                                <a href="#" class="contact_content_right_item_social_content_img svg_full">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 5.441C14.136 5.441 14.389 5.45 15.233 5.488C15.7402 5.49409 16.2425 5.58746 16.718 5.764C17.0658 5.89248 17.3802 6.09754 17.638 6.364C17.9045 6.62179 18.1095 6.93622 18.238 7.284C18.4145 7.75949 18.5079 8.26183 18.514 8.769C18.552 9.613 18.561 9.869 18.561 12.002C18.561 14.135 18.552 14.391 18.514 15.235C18.5079 15.7422 18.4145 16.2445 18.238 16.72C18.1052 17.0651 17.9015 17.3785 17.64 17.64C17.3785 17.9015 17.0651 18.1052 16.72 18.238C16.2445 18.4145 15.7422 18.5079 15.235 18.514C14.391 18.552 14.135 18.561 12.002 18.561C9.869 18.561 9.613 18.552 8.769 18.514C8.26183 18.5079 7.75949 18.4145 7.284 18.238C6.93622 18.1095 6.62179 17.9045 6.364 17.638C6.09754 17.3802 5.89248 17.0658 5.764 16.718C5.58746 16.2425 5.49409 15.7402 5.488 15.233C5.45 14.389 5.441 14.133 5.441 12C5.441 9.867 5.45 9.611 5.488 8.767C5.49409 8.25983 5.58746 7.75749 5.764 7.282C5.89248 6.93422 6.09754 6.61979 6.364 6.362C6.62179 6.09554 6.93622 5.89048 7.284 5.762C7.75949 5.58546 8.26183 5.49209 8.769 5.486C9.613 5.448 9.869 5.439 12.002 5.439M12 4C9.827 4 9.555 4.009 8.7 4.048C8.03696 4.06148 7.381 4.18727 6.76 4.42C6.22596 4.62056 5.74231 4.9356 5.343 5.343C4.9356 5.74231 4.62056 6.22596 4.42 6.76C4.18727 7.381 4.06148 8.03696 4.048 8.7C4.009 9.555 4 9.827 4 12C4 14.173 4.009 14.445 4.048 15.3C4.06148 15.963 4.18727 16.619 4.42 17.24C4.62056 17.774 4.9356 18.2577 5.343 18.657C5.74231 19.0644 6.22596 19.3794 6.76 19.58C7.38163 19.813 8.03828 19.9387 8.702 19.952C9.555 19.991 9.827 20 12 20C14.173 20 14.445 19.991 15.3 19.952C15.9637 19.9387 16.6204 19.813 17.242 19.58C17.7734 19.3743 18.256 19.0599 18.659 18.657C19.0619 18.254 19.3763 17.7714 19.582 17.24C19.815 16.6184 19.9407 15.9617 19.954 15.298C19.993 14.445 20.002 14.173 20.002 11.998C20.002 9.823 19.993 9.553 19.954 8.698C19.9397 8.03552 19.8132 7.38025 19.58 6.76C19.3794 6.22596 19.0644 5.74231 18.657 5.343C18.2577 4.9356 17.774 4.62056 17.24 4.42C16.619 4.18727 15.963 4.06148 15.3 4.048C14.445 4.009 14.173 4 12 4Z" fill="currentColor"/>
                                <path d="M11.9996 7.8916C11.1871 7.8916 10.3929 8.13253 9.71732 8.58392C9.04176 9.03532 8.51523 9.6769 8.20431 10.4275C7.89338 11.1782 7.81203 12.0042 7.97054 12.801C8.12905 13.5979 8.52029 14.3299 9.09481 14.9044C9.66932 15.4789 10.4013 15.8702 11.1982 16.0287C11.995 16.1872 12.821 16.1058 13.5717 15.7949C14.3223 15.484 14.9639 14.9574 15.4153 14.2819C15.8667 13.6063 16.1076 12.8121 16.1076 11.9996C16.1076 11.4601 16.0013 10.9259 15.7949 10.4275C15.5885 9.92913 15.2859 9.47627 14.9044 9.09481C14.5229 8.71334 14.0701 8.41075 13.5717 8.2043C13.0733 7.99786 12.5391 7.8916 11.9996 7.8916ZM11.9996 14.6666C11.4721 14.6666 10.9565 14.5102 10.5179 14.2171C10.0793 13.9241 9.73748 13.5075 9.53562 13.0202C9.33376 12.5329 9.28094 11.9966 9.38385 11.4793C9.48676 10.9619 9.74076 10.4867 10.1137 10.1137C10.4867 9.74076 10.9619 9.48675 11.4793 9.38385C11.9966 9.28094 12.5329 9.33376 13.0202 9.53561C13.5076 9.73747 13.9241 10.0793 14.2171 10.5179C14.5102 10.9565 14.6666 11.4721 14.6666 11.9996C14.6666 12.7069 14.3856 13.3853 13.8855 13.8855C13.3853 14.3856 12.7069 14.6666 11.9996 14.6666Z" fill="currentColor"/>
                                <path d="M16.2696 8.68953C16.7998 8.68953 17.2296 8.25972 17.2296 7.72953C17.2296 7.19934 16.7998 6.76953 16.2696 6.76953C15.7394 6.76953 15.3096 7.19934 15.3096 7.72953C15.3096 8.25972 15.7394 8.68953 16.2696 8.68953Z" fill="currentColor"/>
                                </svg>
                                </a>
                            </div>
                        </div>
                        <div class="contact_content_right_item_work">
                            <div class="contact_content_right_item_social_label txt_16">Working hours</div>
                            <div class="contact_content_right_item_work_des">
                                <div class="contact_content_right_item_work_des_txt contact_border_right txt_14 txt_wh_500 txt_title_color">Mon – Sat: 8am – 5pm</div>
                                <div class="contact_content_right_item_work_des_txt txt_14 txt_wh_500 txt_title_color">Sunday: 9am – 4pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="contact_content_right_item about_border_bottom">
                        <div class="contact_content_right_item_form_title txt_subtitle">Send us a message</div>
                        <div class="contact_content_right_item_form">
                            <?php echo do_shortcode('[contact-form-7 id="79bedf9" title="Contact form"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   </div>
<?php get_footer(); ?>